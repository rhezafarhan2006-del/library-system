@extends('layouts.app')

@section('title', 'Edit Buku - Library System')

@section('content')
<div style="max-width: 680px; margin: 0 auto;">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Edit Data Buku</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                    Perbarui informasi untuk buku <strong>"{{ $book->title }}"</strong>.
                </p>
            </div>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary">
                &larr; Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Judul Buku -->
                <div class="form-group">
                    <label for="title" class="form-label">Judul Buku <span style="color: var(--danger);">*</span></label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           class="form-control" 
                           value="{{ old('title', $book->title) }}" 
                           required>
                    @error('title')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Kategori -->
                <div class="form-group">
                    <label for="category_id" class="form-label">Kategori <span style="color: var(--danger);">*</span></label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                @selected(old('category_id', $book->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Penulis -->
                <div class="form-group">
                    <label for="author" class="form-label">Nama Penulis <span style="color: var(--danger);">*</span></label>
                    <input type="text" 
                           name="author" 
                           id="author" 
                           class="form-control" 
                           value="{{ old('author', $book->author) }}" 
                           required>
                    @error('author')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <!-- Input Tahun Terbit -->
                    <div class="form-group">
                        <label for="year" class="form-label">Tahun Terbit <span style="color: var(--danger);">*</span></label>
                        <input type="number" 
                               name="year" 
                               id="year" 
                               class="form-control" 
                               value="{{ old('year', $book->year) }}" 
                               min="1900" 
                               max="{{ date('Y') + 1 }}" 
                               required>
                        @error('year')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Stok -->
                    <div class="form-group">
                        <label for="stock" class="form-label">Jumlah Stok (Eks) <span style="color: var(--danger);">*</span></label>
                        <input type="number" 
                               name="stock" 
                               id="stock" 
                               class="form-control" 
                               value="{{ old('stock', $book->stock) }}" 
                               min="0" 
                               required>
                        @error('stock')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div style="display: flex; gap: 10px; margin-top: 10px; padding-top: 16px; border-top: 1px solid var(--border-color);">
                    <button type="submit" class="btn btn-primary">
                        💾 Perbarui Data
                    </button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
