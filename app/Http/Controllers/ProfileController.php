<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $nama = "azhira jamilatun";
        $alamat= "bandung";
        $tanggal_lahir = "05052002";

        $data_array = array(
        "nama" => array( "Sutia", ),
        "tanggal" => array( "050502", ),
        "alamat" => array( "bandung", ),
    
        );
        
        return view('profile', compact('nama', 'alamat', 'tanggal_lahir', 'data_array'));
    }
}
    



