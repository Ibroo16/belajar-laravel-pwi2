@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">Edit Data Kategori</div>
    <div class="card-body">
        <form action="/category/{{$updated_kategori->id_category}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="category_name" class="form-control"
                    value="{{old('category_name', $updated_kategori->category_name)}}">
                @error('category_name')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi Kategori</label>
                <textarea class="form-control" name="description"
                    rows="5">{{old('description', $updated_kategori->description)}}</textarea>
                @error('description')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <a href="/category" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
</div>
@endsection
