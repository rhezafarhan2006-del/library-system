@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div style="max-width: 600px; margin: auto;">
    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        @csrf
        @method('PUT') <!-- Wajib untuk proses update di Laravel -->

        <div>
            <label for="title" style="display: block; margin-bottom: 5px;">Judul Buku</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div>
            <label for="author" style="display: block; margin-bottom: 5px;">Penulis</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div>
            <label for="year" style="display: block; margin-bottom: 5px;">Tahun Terbit</label>
            <input type="number" name="year" id="year" value="{{ $book->year }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div>
            <label for="stock" style="display: block; margin-bottom: 5px;">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ $book->stock }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 15px; background: #ffc107; color: black; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Perbarui</button>
            <a href="{{ route('books.index') }}" style="padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; display: inline-block;">Kembali</a>
        </div>
    </form>
</div>
@endsection