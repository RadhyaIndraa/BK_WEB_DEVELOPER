@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Dokter</h1>
    <form action="{{ route('dokters.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_poli" class="form-label">Poli</label>
            <select name="id_poli" id="id_poli" class="form-select" required>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
