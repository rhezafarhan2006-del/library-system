@extends('layouts.app')

@section('title', 'Tambah Buku Baru')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 20px;">
    <h2>Tambah Buku Baru</h2>

    <form action="{{ route('books.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        @csrf

        <div>
            <label for="title" style="display: block; margin-bottom: 5px; font-weight: bold;">Judul Buku</label>
            <input type="text" name="title" id="title" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div>
            <label for="author" style="display: block; margin-bottom: 5px; font-weight: bold;">Penulis</label>
            <input type="text" name="author" id="author" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div>
            <label for="year" style="display: block; margin-bottom: 5px; font-weight: bold;">Tahun Terbit</label>
            <input type="number" name="year" id="year" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div>
            <label for="stock" style="display: block; margin-bottom: 5px; font-weight: bold;">Stok</label>
            <input type="number" name="stock" id="stock" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="display: flex; gap: 10px; margin-top: 10px;">
            <button type="submit" style="padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Simpan</button>
            <a href="{{ route('books.index') }}" style="padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; display: inline-block;">Kembali</a>
        </div>
    </form>
</div>
@endsection