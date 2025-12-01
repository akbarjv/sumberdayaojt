<?php

namespace App\Http\Controllers;

use App\Models\DataPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPerusahaanController extends Controller
{
    public function index()
    {
        $datas = DataPerusahaan::all();
        $users = Auth::user();
        return view('data_perusahaan.index', compact('datas','users'));
    }

    public function create()
    {
        $users = Auth::user();
        return view('data_perusahaan.add',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'google_map' => 'required|string',
            'ig' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'alamat_pickup' => 'required|string',
            'google_map_pickup' => 'required|string',
            'banner_title' => 'nullable|string',
            'banner_subtitle' => 'nullable|string',
        ]);

        DataPerusahaan::create($request->all());

        return redirect()->route('data_perusahaans.index')->with('success', 'Company added successfully!');
    }

    public function edit(DataPerusahaan $data_perusahaan)
    {
        $users = Auth::user();
        return view('data_perusahaan.edit', ['data' => $data_perusahaan,'users' => $users]);
    }

    public function update(Request $request, DataPerusahaan $data_perusahaan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'google_map' => 'required|string',
            'ig' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'alamat_pickup' => 'required|string',
            'google_map_pickup' => 'required|string',
            'banner_title' => 'nullable|string',
            'banner_subtitle' => 'nullable|string',
        ]);

        $data_perusahaan->update($request->all());

        return redirect()->route('data_perusahaans.index')->with('success', 'Company updated successfully!');
    }

    public function destroy(DataPerusahaan $data_perusahaan)
    {
        $data_perusahaan->delete();
        return redirect()->route('data_perusahaans.index')->with('success', 'Company deleted successfully!');
    }
}
