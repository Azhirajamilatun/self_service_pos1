<?php

namespace App\Http\Controller;

use illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $nama = "azhira jamilatun";
        $alamat= "bandung";
        $tanggal_lahir = "05052002";

        return view('profile', compact('nama', 'alamat', 'tanggal_lahir'));
    }
}
    



