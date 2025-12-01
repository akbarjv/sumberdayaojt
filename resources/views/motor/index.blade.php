@extends('layouts.adminmaster')

@section('content')

<div class="app-main p-3">
    <h1 class="mb-4 mt-5">Daftar Motor</h1>

    {{-- Success message --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add Motor button --}}
    <div class="mb-3 justify-content-end d-flex">
        <a href="{{ route('motors.create') }}" class="btn btn-primary">+ Tambah Motor</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($motors as $motor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($motor->gambar)
                        <img src="{{ asset('storage/' . $motor->gambar) }}" alt="Motor Image" width="120"
                            class="rounded">
                        @else
                        <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $motor->nama }}</td>
                    <td>{{ $motor->kategori }}</td>
                    <td>Rp {{ number_format($motor->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('motors.edit', $motor) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('motors.destroy', $motor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this motor?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada motor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Laravel pagination links --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $motors->links() }}
    </div>
</div>
@endsection