@extends('layouts.app')

@section('title', 'Dashboard - Library System')

@section('content')
<style>
    .welcome-hero {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        color: white;
        border-radius: 12px;
        padding: 28px;
        margin-bottom: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
    }

    .welcome-hero h1 {
        font-size: 1.6rem;
        margin-bottom: 6px;
    }

    .welcome-hero p {
        opacity: 0.9;
        font-size: 0.95rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        transition: transform 0.2s, box-shadow 0.2s;
        text-decoration: none;
        color: inherit;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-icon.books { background-color: #dbeafe; color: #1d4ed8; }
    .stat-icon.categories { background-color: #fef3c7; color: #b45309; }
    .stat-icon.members { background-color: #dcfce7; color: #15803d; }
    .stat-icon.users { background-color: #f3e8ff; color: #7e22ce; }

    .stat-info h4 {
        font-size: 0.85rem;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .stat-info .stat-number {
        font-size: 1.7rem;
        font-weight: 700;
        color: var(--text-main);
    }

    .quick-actions-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 10px;
        padding: 22px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .quick-actions-card h3 {
        font-size: 1.1rem;
        margin-bottom: 14px;
        color: var(--text-main);
    }

    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
</style>

<div class="welcome-hero">
    <div>
        <h1>Selamat Datang, {{ auth()->user()->name ?? 'Pengguna' }}! 👋</h1>
        <p>Sistem Informasi Pengelolaan Koleksi Buku dan Layanan Perpustakaan.</p>
    </div>
    <div>
        <span class="user-role-badge role-{{ auth()->user()->role ?? 'petugas' }}" style="font-size: 0.85rem; padding: 6px 12px; background: rgba(255,255,255,0.2); color: white;">
            Role: {{ ucfirst(auth()->user()->role ?? 'petugas') }}
        </span>
    </div>
</div>

<div class="stats-grid">
    <a href="{{ route('books.index') }}" class="stat-card">
        <div class="stat-icon books">📚</div>
        <div class="stat-info">
            <h4>Total Koleksi Buku</h4>
            <div class="stat-number">{{ $stock }}</div>
        </div>
    </a>

    <a href="{{ url('/categories') }}" class="stat-card">
        <div class="stat-icon categories">🏷️</div>
        <div class="stat-info">
            <h4>Kategori Buku</h4>
            <div class="stat-number">{{ $category }}</div>
        </div>
    </a>

    <a href="{{ url('/members') }}" class="stat-card">
        <div class="stat-icon members">👥</div>
        <div class="stat-info">
            <h4>Jumlah Member</h4>
            <div class="stat-number">{{ $member }}</div>
        </div>
    </a>

    @can('manage-users')
    <a href="{{ route('users.index') }}" class="stat-card">
        <div class="stat-icon users">🛡️</div>
        <div class="stat-info">
            <h4>Kelola Pengguna</h4>
            <div class="stat-number">Admin</div>
        </div>
    </a>
    @endcan
</div>

<div class="quick-actions-card">
    <h3>⚡ Aksi Cepat</h3>
    <div class="action-buttons">
        <a href="{{ route('books.create') }}" class="btn btn-success">+ Tambah Buku Baru</a>
        <a href="{{ route('books.index') }}" class="btn btn-primary">📖 Lihat Koleksi Buku</a>
        <a href="{{ url('/categories') }}" class="btn btn-secondary">🏷️ Kategori Buku</a>
        <a href="{{ url('/members') }}" class="btn btn-secondary">👥 Data Member</a>
        @can('manage-users')
            <a href="{{ route('users.index') }}" class="btn btn-warning">🛡️ Kelola Akun Pengguna</a>
        @endcan
    </div>
</div>
@endsection
