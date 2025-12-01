<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $motors = Motor::paginate(6);
         $users = Auth::user();
         return view('motor.index', compact('motors','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth::user();
        return view('motor.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'nama' => 'required|string',
        'kategori' => 'required|string',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:20480',
        'harga' => 'required|numeric',
        ]);

        // Upload image
        if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('motors', 'public');
        }

        Motor::create($data);

        return redirect()->route('motors.index')->with('success', 'motor created successfully.');
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
    public function edit(Motor $motor)
    {
         $users = Auth::user();
         return view('motor.edit', compact('motor','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motor $motor)
    {
        $data = $request->validate([
        'nama' => 'nullable|string',
        'kategori' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
        'harga' => 'required|numeric',
        ]);

        // If new image uploaded, replace old one
        if ($request->hasFile('gambar')) {
        // delete old file
        if ($motor->gambar && \Storage::disk('public')->exists($motor->gambar)) {
        \Storage::disk('public')->delete($motor->gambar);
        }

        // store new
        $data['gambar'] = $request->file('gambar')->store('motors', 'public');
        }

        $motor->update($data);

        return redirect()->route('motors.index')->with('success', 'motor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motor $motor)
    {
         $motor->delete();
         return redirect()->route('motors.index')->with('success', 'motor deleted successfully.');
    }
}
