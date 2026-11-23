@extends('layouts.app')

@section('title', 'Data Member - Library System')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h2>Data Member Perpustakaan</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
                Daftar anggota aktif perpustakaan.
            </p>
        </div>
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-secondary">
            &larr; Dashboard
        </a>
    </div>

    <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 60px; text-align: center;">No</th>
                        <th>Nama Member</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                        <tr>
                            <td style="text-align: center; color: var(--text-muted);">{{ $loop->iteration }}</td>
                            <td>
                                👤 <strong>{{ $member }}</strong>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" style="text-align: center; padding: 36px; color: var(--text-muted);">
                                📭 Belum ada data member.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
