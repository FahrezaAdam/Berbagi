<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;

class TipUserController extends Controller
{
    public function index()
    {
        $tips = Tip::latest()->get();
        return view('user.tip.index', compact('tips'));
    }

    public function create()
    {
        return view('user.tip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'catatan' => 'nullable|string'
        ]);

        Tip::create([
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('user.tip.index')->with('success', 'Tip berhasil dikirim!');
    }
}

