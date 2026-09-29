@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<!-- Memanggil file CSS dari public/CSS/Books/style.css -->
<link rel="stylesheet" href="{{ asset('CSS/Books/style.css') }}">

<h2>Daftar Buku</h2>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
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
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #888;">Tidak ada data buku yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="info-box">
    @if(isset($stock) && $stock > 0)
        <p><strong>Status:</strong> Stok tersedia total {{ $stock }}</p>
    @else
        <p><strong>Status:</strong> Buku sedang habis.</p>
    @endif
</div>
@endsection