<?php

namespace App\Http\Controllers;

class SapaController extends Controller
{
    public function index()
    {
        $nama = 'Malik Ibrahim';
        return view('pages.sapa', ['nama' => $nama]);
    }
}
