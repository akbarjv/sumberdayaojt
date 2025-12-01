@extends('layouts.adminmaster')
@section('content')

<div class="app-main p-3">
    <h1 class="mb-4 mt-5">Edit Paket</h1>

    {{-- Show validation errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pakets.update', $paket) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Package Name --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama paket</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama', $paket->nama) }}" required>
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3"
                class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
            @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Details --}}
        <div class="mb-3">
            <label class="form-label">Isi paket</label>
            <div id="details-wrapper">
                @forelse ($paket->detailPakets as $detail)
                <div class="input-group mb-2 detail-item">
                    <input type="text" name="details[]" class="form-control"
                        value="{{ old('details.' . $loop->index, $detail->isi) }}">
                    <button type="button" class="btn btn-danger remove-detail">X</button>
                </div>
                @empty
                {{-- if no details, show one empty input --}}
                <div class="input-group mb-2 detail-item">
                    <input type="text" name="details[]" class="form-control" placeholder="Contoh : Include perjalanan">
                    <button type="button" class="btn btn-danger remove-detail">X</button>
                </div>
                @endforelse
            </div>
            <button type="button" id="add-detail" class="btn btn-secondary">+ Add Detail</button>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

{{-- JavaScript for dynamic details --}}
<script>
    document.getElementById('add-detail').addEventListener('click', function() {
        let wrapper = document.getElementById('details-wrapper');
        let newDetail = document.createElement('div');
        newDetail.classList.add('input-group', 'mb-2', 'detail-item');
        newDetail.innerHTML = `
            <input type="text" name="details[]" class="form-control" placeholder="Enter detail">
            <button type="button" class="btn btn-danger remove-detail">X</button>
        `;
        wrapper.appendChild(newDetail);
    });

    // Remove detail
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-detail')) {
            e.target.closest('.detail-item').remove();
        }
    });
</script>
@endsection