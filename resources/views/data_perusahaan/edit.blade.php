@extends('layouts.adminmaster')
@section('content')

<div class="app-main p-3">
    <h1 class="mb-4">Edit Data Perusahaan</h1>

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

    <form action="{{ route('data_perusahaans.update', $data) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama', $data->nama) }}" required>
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- No HP --}}
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                value="{{ old('no_hp', $data->no_hp) }}">
            @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3"
                class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $data->alamat) }}</textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Google Map (Lat,Lng) --}}
        <div class="mb-3">
            <label for="google_map" class="form-label">Pin Location</label>
            <input type="text" name="google_map" id="google_map" class="form-control"
                value="{{ old('google_map', $data->google_map) }}" readonly>

            {{-- <label for="address" class="form-label mt-2">Address</label>
            <input type="text" name="address" id="address" class="form-control"
                value="{{ old('address', $data->alamat) }}" readonly> --}}

            <div id="map" style="height: 400px; margin-top:10px;"></div>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Pickup</label>
            <textarea name="alamat_pickup" id="alamat_pickup" rows="3"
                class="form-control @error('alamat_pickup') is-invalid @enderror">{{ old('alamat_pickup', $data->alamat_pickup) }}</textarea>
            @error('alamat_pickup') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Google Map (Lat,Lng) --}}
        <div class="mb-3">
            <label for="google_map" class="form-label">Pin Pickup Location</label>
            <input type="text" name="google_map_pickup" id="google_map_pickup" class="form-control"
                value="{{ old('google_map_pickup', $data->google_map_pickup) }}" readonly>

            {{-- <label for="address" class="form-label mt-2">Address</label>
            <input type="text" name="address" id="address" class="form-control"
                value="{{ old('address', $data->alamat) }}" readonly> --}}

            <div id="map_pickup" style="height: 400px; margin-top:10px;"></div>
        </div>

        {{-- Socials --}}
        <div class="mb-3">
            <label for="ig" class="form-label">Instagram</label>
            <input type="text" name="ig" id="ig" class="form-control" value="{{ old('ig', $data->ig) }}">
        </div>
        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control"
                value="{{ old('facebook', $data->facebook) }}">
        </div>
        <div class="mb-3">
            <label for="tiktok" class="form-label">TikTok</label>
            <input type="text" name="tiktok" id="tiktok" class="form-control"
                value="{{ old('tiktok', $data->tiktok) }}">
        </div>
        <div class="mb-3">
            <label for="x" class="form-label">X (Twitter)</label>
            <input type="text" name="x" id="x" class="form-control" value="{{ old('x', $data->x) }}">
        </div>

        <div class="mb-3">
            <label for="x" class="form-label">Banner title</label>
            <textarea name="banner_title" id="banner_title" rows="3"
                class="form-control @error('banner_title') is-invalid @enderror">{{ old('banner_title', $data->banner_title) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="x" class="form-label">Banner Subtitle</label>
            <input type="text" name="banner_subtitle" id="banner_subtitle" class="form-control"
                value="{{ old('banner_subtitle', $data->banner_subtitle) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('data_perusahaans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

{{-- Leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    // ========== MAP 1 ==========
    let saved1 = document.getElementById("google_map").value;
    let defaultLat1 = -6.200000, defaultLng1 = 106.816666;

    if (saved1) {
        let parts = saved1.split(',');
        defaultLat1 = parseFloat(parts[0]);
        defaultLng1 = parseFloat(parts[1]);
    }

    let map1 = L.map('map').setView([defaultLat1, defaultLng1], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OSM contributors'
    }).addTo(map1);

    let marker1 = L.marker([defaultLat1, defaultLng1], { draggable: true }).addTo(map1);

    function updateLocation1(lat, lng) {
        document.getElementById("google_map").value = lat + "," + lng;

        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
            .then(res => res.json())
            .then(data => {
                document.getElementById("alamat").value = data.display_name || "";
            });
    }

    marker1.on('dragend', function () {
        let { lat, lng } = marker1.getLatLng();
        updateLocation1(lat.toFixed(6), lng.toFixed(6));
    });

    map1.on('click', function (e) {
        marker1.setLatLng(e.latlng);
        updateLocation1(e.latlng.lat.toFixed(6), e.latlng.lng.toFixed(6));
    });

    updateLocation1(defaultLat1, defaultLng1);



    // ========== MAP 2 ==========
    let saved2 = document.getElementById("google_map_pickup").value;
    let defaultLat2 = -6.200000, defaultLng2 = 106.816666;

    if (saved2) {
        let parts = saved2.split(',');
        defaultLat2 = parseFloat(parts[0]);
        defaultLng2 = parseFloat(parts[1]);
    }

    let map2 = L.map('map_pickup').setView([defaultLat2, defaultLng2], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OSM contributors'
    }).addTo(map2);

    let marker2 = L.marker([defaultLat2, defaultLng2], { draggable: true }).addTo(map2);

    function updateLocation2(lat, lng) {
        document.getElementById("google_map_pickup").value = lat + "," + lng;

        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
            .then(res => res.json())
            .then(data => {
                document.getElementById("alamat_pickup").value = data.display_name || "";
            });
    }

    marker2.on('dragend', function () {
        let { lat, lng } = marker2.getLatLng();
        updateLocation2(lat.toFixed(6), lng.toFixed(6));
    });

    map2.on('click', function (e) {
        marker2.setLatLng(e.latlng);
        updateLocation2(e.latlng.lat.toFixed(6), e.latlng.lng.toFixed(6));
    });

    updateLocation2(defaultLat2, defaultLng2);
});
</script>
@endsection