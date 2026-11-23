@extends('layouts.master')

@section('content')
    <h1 class="h3">Daftar Mahasiswa</h1>
    <p>Contoh pengiriman array dari Controller ke View menggunakan <code>@foreach</code>.</p>
    <ul class="list-group">
        @foreach ($mahasiswa as $nama)
            <li class="list-group-item">{{ $nama }}</li>
        @endforeach
    </ul>
@endsection
