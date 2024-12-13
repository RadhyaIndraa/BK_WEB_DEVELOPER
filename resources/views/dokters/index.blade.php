@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Dokter</h1>
    <a href="{{ route('dokters.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Poli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dokter->nama }}</td>
                    <td>{{ $dokter->alamat }}</td>
                    <td>{{ $dokter->no_hp }}</td>
                    <td>{{ $dokter->poli->nama_poli ?? '-' }}</td>
                    <td>
                        <a href="{{ route('dokters.edit', $dokter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dokters.destroy', $dokter->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
