<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokter;
use App\Models\jadwal_periksa;
use App\Models\pasien;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'total_pasien' => pasien::count(),
            'total_dokter' => dokter::count(),
            'total_jadwal' => jadwal_periksa::count(),
        ];

        return view('dashboard.index', $data);
    }
}
