<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $pakets = Paket::paginate(6);
         $users = Auth::user();
         return view('paket.index', compact('pakets','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $users = Auth::user();
         return view('paket.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'details' => 'nullable|array',
        'details.*' => 'nullable|string',
    ]);

    $paket = Paket::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
    ]);

    // Clean details: remove null or empty items
    $details = collect($request->details)
        ->filter(fn($d) => !empty(trim($d))) // remove empty strings
        ->toArray();

    // If still empty, add default text
    if (empty($details)) {
        $details = [
            "Kami Menyediakan Paket Sewa Mingguan dan Paket Sewa Bulanan. Serta Layanan Antar Jemput Sepeda Motor."
        ];
    }

    // Insert multiple detail paket
    foreach ($details as $isi) {
        $paket->detailPakets()->create([
            'isi' => $isi,
        ]);
    }

    return redirect()->route('pakets.index')->with('success', 'Paket created successfully.');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
      $users = Auth::user();
         return view('paket.edit', compact('paket','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'details' => 'nullable|array',
        'details.*' => 'nullable|string|max:255',
    ]);

    // Update main package
    $paket->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
    ]);

    // Clean up old details
    $paket->detailPakets()->delete();

    // Clean details: remove null or empty strings
    $details = collect($request->details)
        ->filter(fn($d) => !empty(trim($d))) // only keep non-empty strings
        ->toArray();

    // If still empty, add default message
    if (empty($details)) {
        $details = [
            "Kami Menyediakan Paket Sewa Mingguan dan Paket Sewa Bulanan. Serta Layanan Antar Jemput Sepeda Motor."
        ];
    }

    // Insert new details
    foreach ($details as $isi) {
        $paket->detailPakets()->create([
            'isi' => $isi,
        ]);
    }

    return redirect()->route('pakets.index')->with('success', 'Package updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
          $paket->delete();
          return redirect()->route('pakets.index')->with('success', 'motor deleted successfully.');
    }
}
