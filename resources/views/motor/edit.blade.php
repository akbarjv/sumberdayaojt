@extends('layouts.adminmaster')
@section('content')

<div class="app-main p-3">
    <h1 class="mb-4 mt-5">Edit Motor</h1>

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

    {{-- Edit Banner Form --}}
    <form action="{{ route('motors.update', $motor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar motor</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">

            <div class="row">
                <div class="col-6">
                    {{-- Show existing image --}}
                    @if($motor->gambar)
                    <div class="mt-3">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $motor->gambar) }}" alt="Current Banner"
                            class="img-fluid rounded border" width="250">
                    </div>
                    @endif
                </div>
                <div class="col-6">
                    {{-- Preview for new image --}}
                    <div class="mt-3">
                        <p>New Preview:</p>
                        <img id="preview-image" src="#" alt="Preview" class="img-fluid d-none rounded border"
                            width="250">
                    </div>
                </div>
            </div>



        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama motor</label>
            <textarea name="nama" id="nama" class="form-control" rows="3">{{ old('nama', $motor->nama) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Keterangan</label>
            <textarea name="kategori" id="kategori" class="form-control"
                rows="3">{{ old('kategori', $motor->kategori) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <textarea name="harga" id="harga" class="form-control" rows="3">{{ old('harga', $motor->harga) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('motors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

{{-- Script for preview --}}
<script>
    document.getElementById('gambar').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-image');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = "#";
            preview.classList.add('d-none');
        }
    });
</script>

@endsection