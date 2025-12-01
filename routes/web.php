<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DataPerusahaanController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PaketController;
use App\Models\Banner;
use App\Models\DataPerusahaan;
use App\Models\Motor;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/random-images', function () {
    $path = public_path('ui/pics');
    $files = collect(File::glob($path . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE))
        ->map(fn($file) => basename($file))
        ->shuffle()
        ->take(10)
        ->values();

    return response()->json($files);
});


Route::get('/', function () {


 $path = public_path('ui/pics');
 $files = collect(glob($path . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE))
 ->map(fn($file) => basename($file));


 $randomimg = $files->shuffle()->take(10);


$datas = DataPerusahaan::all();
$banners = Banner::all();
$motors = Motor::all();
$totalmotor = Motor::count();
$Hitungchunk = (int) ceil($totalmotor / 2);
$chunk1 = $motors->take($Hitungchunk);
$chunk2 = $motors->skip($Hitungchunk);
$selectedBanner = Banner::where('is_selectedv2', true)->first();
$pakets = Paket::with('detailPakets')->get();
 return view('home.home', compact('datas','banners','motors','totalmotor','chunk1','chunk2','pakets','selectedBanner','randomimg'));
});

// Route::get('/dd', function () {
// return view('home.test');
// });


Route::get('/dashboard', function () {
     $datas = DataPerusahaan::all();
     $users = Auth::user();
     $banners = Banner::count();
     $motors = Motor::count();
     $pakets = Paket::count();
     return view('admin.dashboard', compact('datas', 'users','banners','motors','pakets'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








Route::resource('banners', BannerController::class);
Route::post('/banners/{id}/select', [App\Http\Controllers\BannerController::class, 'select'])->name('banners.select');

Route::resource('motors', MotorController::class);
Route::resource('pakets', PaketController::class);
Route::resource('data_perusahaans', DataPerusahaanController::class);

require __DIR__.'/auth.php';
