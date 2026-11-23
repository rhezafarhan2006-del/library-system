@extends('layouts.app')

@section('title', 'Edit Pengguna - Library System')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Edit Pengguna</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                    Perbarui informasi akun <strong>"{{ $user->name }}"</strong>.
                </p>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">
                &larr; Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap <span style="color: var(--danger);">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email <span style="color: var(--danger);">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role -->
                <div class="form-group">
                    <label for="role" class="form-label">Role Akses <span style="color: var(--danger);">*</span></label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="petugas" @selected(old('role', $user->role) === 'petugas')>Petugas</option>
                        <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
                    </select>
                    @error('role')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password (Optional) -->
                <div class="form-group">
                    <label for="password" class="form-label">Password Baru <span style="font-size: 0.8rem; color: var(--text-muted);">(Kosongkan jika tidak ingin mengubah password)</span></label>
                    <input type="password" name="password" id="password" class="form-control" minlength="8">
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" minlength="8">
                </div>

                <div style="display: flex; gap: 10px; margin-top: 10px; padding-top: 16px; border-top: 1px solid var(--border-color);">
                    <button type="submit" class="btn btn-primary">
                        💾 Perbarui Pengguna
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
