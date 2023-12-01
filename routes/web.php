<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswasController;
use App\Models\Prodi;
use App\Models\Mahasiswa;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen',function(){
    return view ('dosen');
});

Route::get('/dosen/index',function(){
    return view ('dosen.index');
});

Route::get('/fakultas',function(){
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
    // return view ('fakultas.index',["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
    // return view('fakultas.index')->with("fakultas",["Fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"]);
    // $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    // return view('fakultas.index', compact('fakultas'));
    $kampus = "Universitas Multi Data Palembang";
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"];
    return view ('fakultas.index', compact('fakultas','kampus'));
});


// Route::get('/prodi',[ProdiController::class, 'index']);

Route::get('/mahasiswa/insert',[MahasiswasController::class, 'insert']);
Route::get('/mahasiswa/update',[MahasiswasController::class, 'update']);
Route::get('/mahasiswa/delete',[MahasiswasController::class, 'delete']);
Route::get('/mahasiswa/select',[MahasiswasController::class, 'select']);

Route::get('/mahasiswa/insert-qb',[MahasiswasController::class,'insertQb']);
Route::get('/mahasiswa/update-qb',[MahasiswasController::class,'updateQb']);
Route::get('/mahasiswa/delete-qb',[MahasiswasController::class,'deleteQb']);
Route::get('/mahasiswa/select-qb',[MahasiswasController::class,'selectQb']);

Route::get('/mahasiswa/insert-elq',[MahasiswasController::class,'insertElq']);
Route::get('/mahasiswa/update-elq',[MahasiswasController::class,'updateElq']);
Route::get('/mahasiswa/delete-elq',[MahasiswasController::class,'deleteElq']);
Route::get('/mahasiswa/select-elq',[MahasiswasController::class,'selectElq']);

Route::get('/prodi/all-join-facade',[ProdiController::class,'allJoinFacade']);
Route::get('/prodi/all-join-elq',[ProdiController::class,'allJoinElq']);
Route::get('/mahasiswa/all-join-elq',[MahasiswasController::class,'allJoinElq']);

Route::get('/prodi/create',[ProdiController::class,'create']);
Route::post('/prodi/store',[ProdiController::class,'store']);
// Route::get('/halo',function(){
//     // return "Halo Semua";
//     return "<a href='". route('call'). "'>" . route('call'). "</a>";
// });

// Route::get('/kampus',function(){
//     echo "<h2>Halo Semua</h2>";
//     echo "Kami Kuliah di Kampus MDP";
// });

// Route::get('/mahasiswa/{nama}',function($nama){
//     echo "<h2>Halo Semua</h2>";
//     echo "Nama Saya $nama";
// });

// Route::get('/mahasiswa/{nama?}',function($nama = 'VanWhoYou'){
//     echo "<h2>Halo Semua</h2>";
//     echo "Nama Saya $nama";
// });

// Route::get('/profil/{nama?}/{pekerjaan?}', function($nama = 'VanWhoYou',$pekerjaan = 'mahasiswa'){
//     echo "<h2>Halo Semua </h2>";
//     echo "Nama Saya $nama, sebagai $pekerjaan";
// })->where('nama','[A-Z]+');

// Route::get('/hubungi', function(){
//     echo "<h2>Hubungi Kami</h2>";
// })->name('call');

// // Route::redirect('/contact','/hubungi'); 

// Route::prefix('/dosen')->group(function(){
//     Route::get('/jadwal',function(){
//         return "<h2>Jadwal</h2>";
//     });

// Route::get('/materi' , function(){
//     return "<h2>Materi Perkuliahan</h2>";
//     });
// });


