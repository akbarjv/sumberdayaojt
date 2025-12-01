@extends('layouts.adminmaster')

@section('content')

<div class="app-main p-3">
    <h1 class="mb-4 mt-5">Daftar Paket</h1>

    {{-- Success message --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add Paket button --}}
    <div class="mb-3 justify-content-end d-flex">
        <a href="{{ route('pakets.create') }}" class="btn btn-primary">+ Tambah Paket</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Isi paket</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pakets as $paket)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $paket->nama }}</td>
                    <td>{{ $paket->deskripsi }}</td>
                    <td>
                        @forelse ($paket->detailPakets as $detail)
                        • {{ $detail->isi }} <br>
                        @empty
                        <span class="text-muted">Tidak ada detail</span>
                        @endforelse
                    </td>
                    <td>
                        <a href="{{ route('pakets.edit', $paket) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('pakets.destroy', $paket) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus paket ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada paket.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Laravel pagination links --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $pakets->links() }}
    </div>
</div>
@endsection