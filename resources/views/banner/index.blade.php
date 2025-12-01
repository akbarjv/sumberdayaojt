@extends('layouts.adminmaster')

@section('content')

<div class="app-main p-3">
    <h1 class="mb-4 mt-5">Daftar Banner</h1>

    {{-- Success message --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add Banner button --}}
    <div class="mb-3 justify-content-end d-flex">
        <a href="{{ route('banners.create') }}" class="btn btn-primary">+ Banner</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                    <th width="150">Aksi</th>
                    <th width="100">Dipilih</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banners as $banner)
                <tr class="{{ $banner->is_selectedv2 ? 'table-success' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($banner->gambar)
                        <img src="{{ asset('storage/' . $banner->gambar) }}" alt="Banner Image" width="120"
                            class="rounded">
                        @else
                        <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $banner->keterangan }}</td>
                    <td>
                        <a href="{{ route('banners.edit', $banner) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('banners.destroy', $banner) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this banner?')">
                                Delete
                            </button>
                        </form>


                    </td>
                    <td>
                        <form action="{{ route('banners.select', $banner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit"
                                class="btn btn-sm {{ $banner->is_selectedv2 ? 'btn-success' : 'btn-outline-success' }}">
                                {{ $banner->is_selectedv2 ? 'Selected' : 'Select' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Tidak ada banner.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-end mt-3">
    {{ $banners->links() }}
</div>
@endsection