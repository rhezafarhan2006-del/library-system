@extends('layouts.app')

@section('title', 'Daftar Buku - Library System')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        <span>✅</span>
        <div>{{ session('success') }}</div>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div>
            <h2>{{ $title ?? 'Daftar Buku' }}</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                {{ $description ?? 'Daftar buku yang tersedia di perpustakaan' }}
            </p>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-success">
            + Tambah Buku Baru
        </a>
    </div>

    <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center;">No</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th style="width: 90px; text-align: center;">Tahun</th>
                        <th style="width: 110px; text-align: center;">Stok</th>
                        <th style="width: 160px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $index => $book)
                        <tr>
                            <td style="text-align: center; color: var(--text-muted);">{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $book->title }}</strong>
                            </td>
                            <td>
                                <span class="badge badge-info">
                                    {{ $book->category?->name ?? 'Belum ada kategori' }}
                                </span>
                            </td>
                            <td>{{ $book->author }}</td>
                            <td style="text-align: center;">{{ $book->year }}</td>
                            <td style="text-align: center;">
                                @if($book->stock > 0)
                                    <span class="badge badge-success">{{ $book->stock }} eks</span>
                                @else
                                    <span class="badge badge-danger">Habis</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div style="display: inline-flex; gap: 6px; justify-content: center;">
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    @can('delete', $book)
                                    <form action="{{ route('books.destroy', $book) }}" 
                                          method="POST" 
                                          class="inline-form"
                                          onsubmit="return confirm('Yakin ingin menghapus buku \'{{ $book->title }}\'?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 36px; color: var(--text-muted);">
                                📭 Belum ada data buku yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center; font-size: 0.9rem; color: var(--text-muted);">
        <span>Total Koleksi: <strong>{{ $books->count() }}</strong> judul buku</span>
        <span>Total Stok Tersedia: <strong>{{ $stock }}</strong> eksemplar</span>
    </div>
</div>

@endsection
