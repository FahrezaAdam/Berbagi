<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    // ========================================================
    // LIST BARANG USER
    // ========================================================
    public function index()
    {
        $items = Item::where('user_id', auth()->id())->paginate(10);
        return view('user.items.index', compact('items'));
    }

    // ========================================================
    // FORM TAMBAH BARANG
    // ========================================================
    public function create()
    {
        $categories = Category::all();
        return view('user.items.create', compact('categories'));
    }

    // ========================================================
    // SIMPAN BARANG
    // ========================================================
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads/items', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';

        Item::create($data);

        return redirect()
            ->route('user.items.index')
            ->with('success', 'Barang berhasil dikirim!');
    }

    // ========================================================
    // TAMPIL DETAIL BARANG (SHOW)
    // ========================================================
    public function show($id)
    {
        $item = Item::findOrFail($id);
        $this->authorizeOwnership($item);

        return view('user.items.show', compact('item'));
    }

    // ========================================================
    // FORM EDIT BARANG
    // ========================================================
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $this->authorizeOwnership($item);

        $categories = Category::all();
        return view('user.items.edit', compact('item', 'categories'));
    }

    // ========================================================
    // UPDATE BARANG
    // ========================================================
    public function update(Request $req, $id)
    {
        $item = Item::findOrFail($id);
        $this->authorizeOwnership($item);

        $req->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $req->only(['nama_barang', 'kategori', 'kondisi', 'deskripsi']);

        // Jika ada foto baru
        if ($req->hasFile('foto')) {
            $file = $req->file('foto');
            $name = time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/items', $name);

            $data['foto'] = 'storage/items/' . $name;
        }

        $item->update($data);

        return redirect()
            ->route('user.items.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    // ========================================================
    // HAPUS BARANG
    // ========================================================
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $this->authorizeOwnership($item);

        $item->delete();

        return back()->with('success', 'Barang berhasil dihapus');
    }

    // ========================================================
    // VALIDASI PEMILIK ITEM
    // ========================================================
    private function authorizeOwnership($item)
    {
        if ($item->user_id != auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke item ini');
        }
    }
}
