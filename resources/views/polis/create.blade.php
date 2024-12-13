@extends('layouts.app')

@section('content')
    <h1>Tambah Poli</h1>

    <form action="{{ route('polis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_poli" class="form-label">Nama Poli</label>
            <input type="text" class="form-control" id="nama_poli" name="nama_poli" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
