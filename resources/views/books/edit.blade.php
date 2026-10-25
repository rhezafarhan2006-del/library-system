@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 20px;">
    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        @csrf
        @method('PUT') <!-- Wajib untuk proses update data di Laravel -->

        <!-- Input Judul Buku -->
        <div>
            <label for="title" style="display: block; margin-bottom: 5px; font-weight: bold;">Judul Buku</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('title')
                <p style="color: red; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Kategori (Materi Pertemuan 11 - Menggunakan old dengan fallback ke data database) -->
        <div>
            <label for="category_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Kategori</label>
            <select name="category_id" id="category_id" style="width: 100%; padding: 8px; box-sizing: border-box;">
                <option value="">Pilih kategori</option>
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                        @selected(old('category_id', $book->category_id) == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p style="color: red; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Penulis -->
        <div>
            <label for="author" style="display: block; margin-bottom: 5px; font-weight: bold;">Penulis</label>
            <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('author')
                <p style="color: red; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Tahun Terbit -->
        <div>
            <label for="year" style="display: block; margin-bottom: 5px; font-weight: bold;">Tahun Terbit</label>
            <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('year')
                <p style="color: red; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Stok -->
        <div>
            <label for="stock" style="display: block; margin-bottom: 5px; font-weight: bold;">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            @error('stock')
                <p style="color: red; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div style="display: flex; gap: 10px; margin-top: 10px;">
            <button type="submit" style="padding: 10px 15px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Perbarui</button>
            <a href="{{ route('books.index') }}" style="padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; display: inline-block;">Kembali</a>
        </div>
    </form>
</div>
@endsection