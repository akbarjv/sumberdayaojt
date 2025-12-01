@extends('layouts.adminmaster')

@section('content')

<!--begin::App Main-->
<div class="app-main p-3">
    <h1 class="mb-4 mt-5">Data Perusahaan</h1>

    {{-- Success message --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add button --}}

    {{-- <div class="mb-3">
        <a href="{{ route('data_perusahaans.create') }}" class="btn btn-primary">+ Add Company</a>
    </div> --}}

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Nomor hp</th>
                    <th>Alamat</th>
                    <th>Map</th>
                    <th>Instagram</th>
                    <th>Facebook</th>
                    <th>TikTok</th>
                    <th>X (Twitter)</th>
                    <th width="50">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->nama }}</td>
                    <td>{{ $company->no_hp }}</td>
                    <td>{{ $company->alamat }}</td>

                    {{-- Google Map Embed --}}
                    <td>
                        @if($company->google_map)
                        <iframe width="200" height="150" style="border:0" loading="lazy" allowfullscreen
                            src="https://www.google.com/maps?q={{ $company->google_map }}&output=embed">
                        </iframe>
                        @else
                        <span class="text-muted">No location</span>
                        @endif
                    </td>

                    <td>{{ $company->ig }}</td>
                    <td>{{ $company->facebook }}</td>
                    <td>{{ $company->tiktok }}</td>
                    <td>{{ $company->x }}</td>

                    {{-- Actions --}}
                    <td>
                        <a href="{{ route('data_perusahaans.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>

                        {{-- <form action="{{ route('data_perusahaans.destroy', $company) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this company?')">
                                Delete
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-muted">Tidak ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<!--end::App Main-->
@endsection