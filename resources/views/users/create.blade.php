@extends('layouts.app')

@section('title', 'Tambah Pengguna - Library System')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Tambah Pengguna Baru</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                    Daftarkan akun admin atau petugas perpustakaan.
                </p>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">
                &larr; Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap <span style="color: var(--danger);">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email <span style="color: var(--danger);">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role -->
                <div class="form-group">
                    <label for="role" class="form-label">Role Akses <span style="color: var(--danger);">*</span></label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="petugas" @selected(old('role') === 'petugas')>Petugas</option>
                        <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                    </select>
                    @error('role')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password <span style="color: var(--danger);">*</span></label>
                    <input type="password" name="password" id="password" class="form-control" minlength="8" required>
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password <span style="color: var(--danger);">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" minlength="8" required>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 10px; padding-top: 16px; border-top: 1px solid var(--border-color);">
                    <button type="submit" class="btn btn-success">
                        💾 Simpan Pengguna
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
