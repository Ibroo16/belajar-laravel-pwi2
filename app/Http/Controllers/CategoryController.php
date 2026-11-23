<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori (GET /category)
     */
    public function index()
    {
        // ambil data kategori dari database, 5 data per halaman
        $data_kategori = CategoryProduct::paginate(5);

        return view('pages.category.show', [
            'kategori' => $data_kategori,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit (GET /category/{category}/edit)
     */
    public function edit(string $id)
    {
        // ambil 1 data kategori berdasarkan id
        $data_kategori = CategoryProduct::findOrFail($id);

        return view('pages.category.editCategory', [
            'updated_kategori' => $data_kategori,
        ]);
    }

    /**
     * Menyimpan perubahan data (PUT /category/{category})
     */
    public function update(Request $request, string $id)
    {
        // validasi data yang diinputkan pada form edit
        $request->validate([
            'category_name' => 'required|min:3|max:150',
            'description' => 'required',
        ],[
            'category_name.required' => 'Nama kategori wajib diisi.',
            'category_name.min' => 'Nama kategori minimal 3 karakter.',
            'category_name.max' => 'Nama kategori maksimal 150 karakter.',
            'description.required' => 'Deskripsi kategori wajib diisi.',
        ]);

        // ubah data menggunakan Eloquent ORM
        CategoryProduct::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect('/category')->with('message', 'Data Kategori Berhasil Diupdate');
    }

    /**
     * Menghapus data (DELETE /category/{category})
     */
    public function destroy(string $id)
    {
        $kategori = CategoryProduct::findOrFail($id);

        // kategori yang masih dipakai produk tidak boleh dihapus
        if (Product::where('id_category', $kategori->id_category)->exists()) {
            return redirect('/category')->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh produk.');
        }

        $kategori->delete();

        return redirect('/category')->with('message', 'Data Kategori Berhasil Dihapus');
    }
}
