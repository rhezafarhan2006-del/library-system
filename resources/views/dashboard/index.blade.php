@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

<h2>Library System Dashboard</h2>
<p>Selamat datang di Sistem Informasi Perpustakaan</p>

<p>Jumlah member : {{$member}}</p>
<p>Jumlah Kategori : {{$category}}</p>

@if($stock > 0)
    <p>Stock tersedia : {{$stock}}</p>
@else
    <p>Buku sedang habis.</p>
@endif

@endsection