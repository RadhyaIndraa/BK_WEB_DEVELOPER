@extends('layouts.app')

@section('content')
    <h1>Kelola Pasien</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. KTP</th>
                <th>No. HP</th>
                <th>No. RM</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $pasien)
                <tr>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->no_ktp }}</td>
                    <td>{{ $pasien->no_hp }}</td>
                    <td>{{ $pasien->no_rm }}</td>
                    <td>
                        <a href="{{ route('pasiens.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pasiens.delete', $pasien->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
