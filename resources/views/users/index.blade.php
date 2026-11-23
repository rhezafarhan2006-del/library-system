@extends('layouts.app')

@section('title', 'Kelola Pengguna - Library System')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        <span>✅</span>
        <div>{{ session('success') }}</div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <span>⚠️</span>
        <div>{{ session('error') }}</div>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div>
            <h2>Kelola Pengguna Sistem</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                Daftar akun admin dan petugas perpustakaan.
            </p>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-success">
            + Tambah Pengguna Baru
        </a>
    </div>

    <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center;">No</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th style="width: 120px; text-align: center;">Role</th>
                        <th style="width: 160px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td style="text-align: center; color: var(--text-muted);">{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $user->name }}</strong>
                                @if (auth()->id() === $user->id)
                                    <span class="badge badge-info" style="margin-left: 6px;">Akun Anda</span>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td style="text-align: center;">
                                <span class="user-role-badge role-{{ $user->role }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <div style="display: inline-flex; gap: 6px; justify-content: center;">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    @if (auth()->id() !== $user->id)
                                        <form action="{{ route('users.destroy', $user->id) }}"
                                              method="POST"
                                              class="inline-form"
                                              onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 36px; color: var(--text-muted);">
                                📭 Belum ada data pengguna.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer" style="font-size: 0.9rem; color: var(--text-muted);">
        Total Pengguna: <strong>{{ $users->count() }}</strong> akun
    </div>
</div>

@endsection
