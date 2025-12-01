<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{


   public function select($id)
   {
   // Unselect all banners
   \App\Models\Banner::query()->update(['is_selectedv2' => false]);

   // Select the chosen one
   $banner = \App\Models\Banner::findOrFail($id);
   $banner->is_selectedv2 = true;
   $banner->save();

   return redirect()->back()->with('success', 'Banner selected successfully!');
   }





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $banners = Banner::paginate(6);
         $users = Auth::user();
         return view('banner.index', compact('banners','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth::user();
        return view('banner.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'keterangan' => 'nullable|string',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:20480',
        ]);

        // Upload image
        if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('banners', 'public');
        }

        Banner::create($data);

        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
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
    public function edit(Banner $banner)
    {
         $users = Auth::user();
         return view('banner.edit', compact('banner','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
            $data = $request->validate([
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
            ]);

            // If new image uploaded, replace old one
            if ($request->hasFile('gambar')) {
            // delete old file
            if ($banner->gambar && \Storage::disk('public')->exists($banner->gambar)) {
            \Storage::disk('public')->delete($banner->gambar);
            }

            // store new
            $data['gambar'] = $request->file('gambar')->store('banners', 'public');
            }

            $banner->update($data);

            return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
         $banner->delete();
         return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }
}
