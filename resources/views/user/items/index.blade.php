<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">

    <h4 class="mb-3">Barang Saya</h4>

    <a href="{{ route('user.items.create') }}" class="btn btn-primary btn-sm mb-3">
        Tambah Barang
    </a>

    <div class="row">
        @foreach($items as $item)
        <div class="col-md-4 mb-3">
            <div class="card">

                {{-- FOTO BARANG --}}
                @if($item->foto)
                    <img src="{{ asset($item->foto) }}" 
                         class="card-img-top" 
                         style="height:160px;object-fit:cover">
                @endif

                <div class="card-body">

                    <h5>{{ $item->nama_barang }}</h5>
                    <p>{{ Str::limit($item->deskripsi, 80) }}</p>

                    {{-- STATUS --}}
                    <small class="badge
                        @if($item->status=='pending') bg-warning
                        @elseif($item->status=='approved') bg-success
                        @else bg-danger
                        @endif">
                        {{ ucfirst($item->status) }}
                    </small>

                    <div class="mt-3 d-flex gap-2">

                        {{-- EDIT --}}
                        <a href="{{ route('user.items.edit', $item->id) }}" 
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('user.items.destroy', $item->id) }}" 
                              method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Hapus barang ini?')">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $items->links() }}
    </div>

</div>

</body>
</html>
