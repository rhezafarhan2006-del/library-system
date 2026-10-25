<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; // Wajib diimport untuk mengakses data kategori
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan';
        // Menggunakan Eager Loading agar relasi category ikut terbawa[cite: 23]
        $books = Book::with('category')->get(); 
        $stock = Book::sum('stock');

        return view('books.index', compact('title', 'description', 'books', 'stock'));
    }

    public function show($id)
    { 
        return 'ID Buku ' . $id;
    }

    public function create()
    {
        // Mengambil data kategori diurutkan berdasarkan nama untuk pilihan pada form[cite: 25]
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input termasuk category_id dengan aturan exists
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:1900',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id', // Memastikan kategori valid di tabel categories[cite: 27]
        ]);

        // Simpan data menggunakan data yang sudah tervalidasi
        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        // Mengirim data buku dan daftar kategori ke view edit[cite: 28]
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        // Validasi pembaruan data, termasuk category_id[cite: 29]
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:1900',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Perbarui data dengan data tervalidasi[cite: 29]
        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Data buku berhasil dihapus.');
    }
}