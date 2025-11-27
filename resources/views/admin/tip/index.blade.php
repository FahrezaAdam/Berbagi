@extends('layouts.app')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<h4>Data Tip Masuk</h4>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Jumlah</th>
            <th>Pesan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tips as $tip)
        <tr>
            <td>{{ $tip->id }}</td>
            <td>{{ $tip->user->name }}</td>
            <td>Rp {{ number_format($tip->jumlah) }}</td>
            <td>{{ $tip->pesan }}</td>
            <td>{{ $tip->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
