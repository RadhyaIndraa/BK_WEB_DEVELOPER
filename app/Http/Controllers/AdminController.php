<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        echo 'hallo, selamat datang admin poli';
        echo '<h1>'. Auth::user()->name .'</h1>';
        echo "<a href= '/logout'>Logout >></a>"; 
    }
    function dokter(){
        echo 'hallo, selamat datang dokter';
        echo '<h1>'. Auth::user()->name .'</h1>';
        echo "<a href= '/logout'>Logout >></a>"; 
    }
    function pasien(){
        echo 'hallo, selamat datang';
        echo '<h1>'. Auth::user()->name .'</h1>';
        echo "<a href= '/logout'>Logout >></a>"; 
    }
}
