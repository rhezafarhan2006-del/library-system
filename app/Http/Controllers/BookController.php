<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan';
        $books = Book::all();
        $stock = Book::sum('stock');

        return view('books.index', compact('title', 'description', 'books', 'stock'));
    }

    public function show($id)
    { 
        return 'ID Buku ' . $id;
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // --- TAMBAHKAN KODE INI UNTUK FITUR EDIT & UPDATE ---

    // 1. Menampilkan form edit berdasarkan data buku (Route Model Binding)
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // 2. Memperbarui data buku ke database
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // 3. Menghapus data buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}