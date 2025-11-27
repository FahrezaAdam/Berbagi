@extends('layouts.app')

@section('content')
<h4>Kirim Tip</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('user.tip.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Jumlah Tip</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Pesan (opsional)</label>
        <textarea name="pesan" class="form-control"></textarea>
    </div>

    <button class="btn btn-purple">Kirim Tip</button>
</form>
@endsection
