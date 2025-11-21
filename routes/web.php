<?php

use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Provinsi;
use Laravel\Prompts\Table;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\ProvinsiController;
use Carbon\Carbon;

Route::get('/', function () {
    return view('landing');
});

// Route::get('/table', function () {
//     $siswas = Siswa::latest();
//     if (request('search')) {
//         $siswas->where(function($query) {
//             $search = request('search');
//             $query->where('nisn', 'like', $search . '%')
//                 ->orWhere('siswa_namalengkap', 'like', '%' . $search . '%')
//                 ->orWhere('kelas', 'like', $search . '%');
//         });
//     }
    
//     // PERUBAHAN: Jika request adalah AJAX, kembalikan JSON data siswa
//     if (request()->ajax()) {
//         $paginated = $siswas->paginate(10)->appends(request()->query());
//         return response()->json($paginated);  // Kembalikan data sebagai JSON
//     }
    
//     // Jika bukan AJAX (misalnya, akses langsung via browser atau submit form), kembalikan view penuh seperti sebelumnya
//     return view('table', ['title' => "Tabel Siswa", 'siswas' => $siswas->paginate(10)->appends(request()->query())]);
// })->middleware(['auth', 'verified'])->name('table');

Route::get('/table', [TableController::class, 'index'])->middleware('auth', 'verified')->name('table');
Route::get('/search', [TableController::class, 'search']);
Route::get('/input', [InputController::class, 'index'])->middleware('auth', 'verified')->name('input');
Route::get('/sekolah', [SekolahController::class, 'index'])->middleware('auth', 'verified')->name('Sekolah');
Route::get('/provinsi', [ProvinsiController::class, 'index'])->middleware('auth', 'verified')->name('Provinsi');

route::post('/input', [InputController::class, 'store'])->middleware('auth', 'verified')->name('siswa.store');
route::get('/siswa/edit/{id}', [TableController::class, 'edit'])->middleware(['auth', 'verified'])->name('siswa.edit');
Route::put('/siswa/edit/{id}', [TableController::class, 'update'])->name('siswa.update');



Route::get('/dashboard', function () {
    $jumlahPerHari = [];
    for ($i = 0; $i <= 6; $i++) {
        $tanggal = Carbon::today()->subDays($i);
        $jumlah = Siswa::whereDate('created_at', $tanggal)->count();
        $jumlahPerHari[] = $jumlah;
    }
    return view('dashboard', [
        'title' => "Dasboard",
        'siswas' => Siswa::latest()->paginate(5),
        'count' => Siswa::count(),
        'jumlah_per_hari' => $jumlahPerHari,
        'count_male' => Siswa::where('jenis_kelamin', 'Laki-laki')->count(),
        'count_female' => Siswa::where('jenis_kelamin', 'Perempuan')->count(),
        'count_sekolah' => Sekolah::count(),
        'count_provinsi' => Provinsi::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/siswa/nisn/{siswa:nisn}', [TableController::class, 'show'])->middleware(['auth', 'verified'])->name('siswa.show');
Route::delete('/siswa/{id}', [TableController::class, 'destroy'])->name('siswa.destroy');
require __DIR__.'/auth.php';
