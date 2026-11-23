@extends('layouts.app')

@section('title', 'Kategori Buku - Library System')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h2>Kategori Buku</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                Daftar kategori untuk pengelompokan buku di perpustakaan.
            </p>
        </div>
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary">
            &larr; Lihat Buku
        </a>
    </div>

    <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 60px; text-align: center;">No</th>
                        <th>Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td style="text-align: center; color: var(--text-muted);">{{ $loop->iteration }}</td>
                            <td>
                                🏷️ <strong>{{ is_string($category) ? $category : $category->name }}</strong>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" style="text-align: center; padding: 36px; color: var(--text-muted);">
                                📭 Belum ada data kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
