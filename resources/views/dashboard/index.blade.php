@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard Poliklinik</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Pasien</h5>
                    <h3>{{ $total_pasien }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Dokter</h5>
                    <h3>{{ $total_dokter }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Jadwal Konsultasi</h5>
                    <h3>{{ $total_jadwal }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
