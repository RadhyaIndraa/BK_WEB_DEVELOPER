@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Dokter</h1>
    <form action="{{ route('dokters.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $dokter->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $dokter->alamat }}">
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $dokter->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label for="id_poli" class="form-label">Poli</label>
            <select name="id_poli" id="id_poli" class="form-select" required>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}" {{ $dokter->id_poli == $poli->id ? 'selected' : '' }}>{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
