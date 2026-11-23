@extends('layouts.app')

@section('title', 'Detail Pengguna - Library System')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Detail Pengguna</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                    Informasi akun pengguna sistem perpustakaan.
                </p>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">
                &larr; Kembali
            </a>
        </div>

        <div class="card-body">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 12px 0; width: 35%; color: var(--text-muted); font-weight: 600;">Nama Lengkap</td>
                    <td style="padding: 12px 0; font-weight: 700;">{{ $user->name }}</td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 12px 0; color: var(--text-muted); font-weight: 600;">Email</td>
                    <td style="padding: 12px 0;">{{ $user->email }}</td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 12px 0; color: var(--text-muted); font-weight: 600;">Role Hak Akses</td>
                    <td style="padding: 12px 0;">
                        <span class="user-role-badge role-{{ $user->role }}">
                            {{ $user->role }}
                        </span>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 12px 0; color: var(--text-muted); font-weight: 600;">Terdaftar Pada</td>
                    <td style="padding: 12px 0;">{{ $user->created_at?->translatedFormat('d F Y H:i') ?? '-' }}</td>
                </tr>
            </table>

            <div style="display: flex; gap: 10px; margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--border-color);">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                    ✏️ Edit Pengguna Ini
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
