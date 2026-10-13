@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<!-- Memanggil file CSS -->
<link rel="stylesheet" href="{{ asset('CSS/Books/style.css') }}">

<h2>Daftar Buku</h2>

<!-- Tombol Tambah Buku Baru -->
<div style="margin-bottom: 15px;">
    <a href="{{ route('books.create') }}" style="padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Buku Baru</a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $book->title }}</strong></td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>
                        @if($book->stock > 0)
                            <span class="badge-stock badge-ready">{{ $book->stock }} eks</span>
                        @else
                            <span class="badge-stock badge-empty">Habis</span>
                        @endif
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('books.edit', $book) }}" style="padding: 4px 8px; background: #ffc107; color: black; text-decoration: none; border-radius: 3px; margin-right: 5px;">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus buku ini?')" style="padding: 4px 8px; background: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #888;">Tidak ada data buku yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="info-box" style="margin-top: 15px;">
    <p><strong>Total Judul Buku:</strong> {{ $books->count() }}</p>
</div>
@endsection