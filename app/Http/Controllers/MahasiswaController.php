<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'Malik Ibrahim',
            'Ali',
            'Dika',
        ];

        return view('pages.mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
}
