@extends('layouts.app')

@section('title', 'Detail Buku - Library System')

@section('content')
<div style="max-width: 680px; margin: 0 auto;">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Detail Koleksi Buku</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                    ID Buku: #{{ $idBooks ?? ($book->id ?? '-') }}
                </p>
            </div>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary">
                &larr; Kembali
            </a>
        </div>

        <div class="card-body">
            @if(isset($book))
                <table style="width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; width: 35%; color: var(--text-muted); font-weight: 600;">Judul Buku</td>
                        <td style="padding: 12px 0; font-weight: 700;">{{ $book->title }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 600;">Kategori</td>
                        <td style="padding: 12px 0;">
                            <span class="badge badge-info">{{ $book->category?->name ?? 'Belum ada kategori' }}</span>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 600;">Penulis</td>
                        <td style="padding: 12px 0;">{{ $book->author }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 600;">Tahun Terbit</td>
                        <td style="padding: 12px 0;">{{ $book->year }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 600;">Ketersediaan Stok</td>
                        <td style="padding: 12px 0;">
                            @if($book->stock > 0)
                                <span class="badge badge-success">{{ $book->stock }} eksemplar tersedia</span>
                            @else
                                <span class="badge badge-danger">Stok Habis</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <div style="display: flex; gap: 10px; margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--border-color);">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">
                        ✏️ Edit Buku Ini
                    </a>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                        Kembali ke Daftar
                    </a>
                </div>
            @else
                <p style="color: var(--text-muted); padding: 20px 0;">Data buku tidak ditemukan.</p>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
            @endif
        </div>
    </div>
</div>
@endsection
