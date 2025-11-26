@extends('layouts.app')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<h3 class="mb-3">Manajemen Barang</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->deskripsi }}</td>

                    <td>
                        @if($item->status == 'pending')
                            <span class="badge bg-warning">Menunggu ACC</span>
                        @elseif($item->status == 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>

                    <td>
                        {{-- ACC --}}
                        <form action="{{ route('admin.items.acc', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-success btn-sm">ACC</button>
                        </form>

                        {{-- Tolak --}}
                        <button class="btn btn-danger btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalTolak{{ $item->id }}">
                            Tolak
                        </button>
                    </td>
                </tr>

                {{-- Modal Alasan Penolakan --}}
                <div class="modal fade" id="modalTolak{{ $item->id }}">
                    <div class="modal-dialog">
                        <form action="{{ route('admin.items.reject', $item->id) }}" method="POST" class="modal-content">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title">Alasan Penolakan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <textarea name="alasan" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
