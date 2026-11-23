@extends('layouts.master')

@section('content')
<h1>Daftar Kategori</h1>
<hr>

@if (session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
@if (session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif

<div class="card">
    <div class="card-header">
        Kategori Kami
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $item)
                <tr>
                    <th scope="row">{{($kategori->perPage() * ($kategori->currentPage()-1)) +
                        $loop->iteration}}</th>
                    {{-- Soal 1: data diambil dari database --}}
                    <td>{{$item->category_name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="/category/{{$item->id_category}}/edit" class="btn btn-warning">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapus{{$item->id_category}}">
                            Hapus
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data yang anda cari tidak ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $kategori->links('pagination::bootstrap-5') }}
            Halaman : {{ $kategori->currentPage() }} <br />
            Jumlah Data : {{ $kategori->total() }} <br />
            Data Per Halaman : {{ $kategori->perPage() }} <br />
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($kategori as $item)
<div class="modal fade" id="hapus{{$item->id_category}}" tabindex="-1" aria-labelledby="modalLabel{{$item->id_category}}"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="/category/{{$item->id_category}}" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{$item->id_category}}">KONFIRMASI ULANG !!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus kategori {{$item->category_name}} ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus Data</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
