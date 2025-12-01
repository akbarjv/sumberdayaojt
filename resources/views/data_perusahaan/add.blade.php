@extends('layouts.adminmaster')
@section('content')


<div class="app-main p-3">
    <h1 class="mb-4 mt-5">Add New Company</h1>

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

    <form action="{{ route('data_perusahaans.store') }}" method="POST">
        @csrf

        {{-- Company Name --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Company Name</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        {{-- Phone --}}
        <div class="mb-3">
            <label for="no_hp" class="form-label">Phone Number</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}">
        </div>

        {{-- Address --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Address</label>
            <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ old('alamat') }}</textarea>
        </div>

        {{-- Google Map (Lat,Lng) --}}
        <div class="mb-3">
            <label for="google_map" class="form-label">Pin Location</label>
            <input type="text" name="google_map" id="google_map" class="form-control" value="{{ old('google_map') }}">

            {{-- <label for="address" class="form-label mt-2">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" readonly>
            --}}

            <div id="map" style="height: 400px; margin-top:10px;"></div>
        </div>

        {{-- Social Media --}}
        <div class="mb-3">
            <label for="ig" class="form-label">Instagram</label>
            <input type="text" name="ig" id="ig" class="form-control" value="{{ old('ig') }}">
        </div>

        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook') }}">
        </div>

        <div class="mb-3">
            <label for="tiktok" class="form-label">TikTok</label>
            <input type="text" name="tiktok" id="tiktok" class="form-control" value="{{ old('tiktok') }}">
        </div>

        <div class="mb-3">
            <label for="x" class="form-label">X (Twitter)</label>
            <input type="text" name="x" id="x" class="form-control" value="{{ old('x') }}">
        </div>
        <div class="mb-3">
            <label for="x" class="form-label">Banner title</label>
            <input type="text" name="banner_title" id="banner_title" class="form-control" rows="5"
                value="{{ old('banner_title') }}">
        </div>
        <div class="mb-3">
            <label for="x" class="form-label">Banner Subtitle</label>
            <input type="text" name="banner_subtitle" id="banner_subtitle" class="form-control"
                value="{{ old('banner_subtitle') }}">
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Save Company</button>
    </form>
</div>


<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let defaultLat = -6.200000, defaultLng = 106.816666; // Jakarta default
    let map = L.map('map').setView([defaultLat, defaultLng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OSM contributors'
    }).addTo(map);

    let marker = L.marker([defaultLat, defaultLng], {draggable:true}).addTo(map);

    function updateLocation(lat, lng) {
        document.getElementById("google_map").value = lat + "," + lng;

        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
            .then(res => res.json())
            .then(data => {
                // document.getElementById("address").value = data.display_name || "Unknown location";
                document.getElementById("alamat").value = data.display_name || "";
            });
    }

    marker.on('dragend', function(e) {
        let lat = marker.getLatLng().lat.toFixed(6);
        let lng = marker.getLatLng().lng.toFixed(6);
        updateLocation(lat, lng);
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        updateLocation(e.latlng.lat.toFixed(6), e.latlng.lng.toFixed(6));
    });

    // Load initial
    updateLocation(defaultLat, defaultLng);
});
</script>
@endsection