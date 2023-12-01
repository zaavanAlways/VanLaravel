<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswasController extends Controller
{
    public function insert(){
        $result = DB::select('insert into mahasiswas(npm,nama_mahasiswa,tempat_lahir,tanggal_lahir,
        alamat,prodi_id,created_at) values (?,?,?,?,?,?,?)',['2226250023','Angga','Palembang',
        '2004-04-23','Jln.Mufakat','1',now()]);

        $result = DB::select('insert into mahasiswas(npm,nama_mahasiswa,tempat_lahir,tanggal_lahir,
        alamat,prodi_id,created_at) values (?,?,?,?,?,?,?)',['2226250021','Laras','Bogor',
        '2005-05-10','Jln.Kenari','2',now()]);
        dump($result);
    }

    public function update(){
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Angga",
        updated_at = now() where npm = ?',['2226250023']);
    }

    public function delete(){
        $result = DB::select('delete from mahasiswas where npm = ?',
        ['2226250023']);
        dump($result);
    }

    public function select(){
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index',['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertQb(){
        $result = DB::table('mahasiswas')->insert([
            'npm' => '2226250010',
            'nama_mahasiswa' => 'Chintya',
            'tempat_lahir' => 'Jawa Tengah',
            'tanggal_lahir' => '2001-03-19',
            'alamat' => 'Jln. Federasi',
            'created_at' => now()
        ]);
        dump($result);
    }

    public function updateQb(){
        $result = DB::table('mahasiswas')
            ->where('npm','2226250010')
            ->update([
                'nama_mahasiswa' => 'Citra',
                'updated_at' => now()
            ]);
            dump($result);
    }

    public function deleteQb(){
        $result = DB::table('mahasiswas')
            ->where('npm', '=', '2226250010')
            ->delete();
        dump($result);
    }

    public function selectQb(){
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        return view('mahasiswa.index',['allmahasiswa' => $result , 'kampus' => $kampus]);
    }

    public function insertElq(){
        $mahasiswa = new Mahasiswa; //instansiasi class Mahasiswa
        $mahasiswa->npm = '2226250029'; //isi property
        $mahasiswa->nama_mahasiswa = 'Veronica';
        $mahasiswa->tempat_lahir = 'New Zealand';
        $mahasiswa->tanggal_lahir = '2002-01-24';
        $mahasiswa->alamat = 'Jln.Kenangan';
        $mahasiswa->save(); //menyimpan data ke tabel mahasiswas
        dump($mahasiswa); //melihat isi $mahasiswa
    }

    public function updateElq(){
        $mahasiswa = Mahasiswa::where('npm','2226250029')->first(); //cari data tabel mahasiswas berdasarkan npm
        $mahasiswa->nama_mahasiswa = "Adele";
        $mahasiswa->save(); //menyimpan data ketabel mahasiswas
        dump($mahasiswa);
    }

    public function deleteElq(){
        $mahasiswa = Mahasiswa::where('npm','2226250029')->first(); //cari data tabel mahasiswas berdasarkan npm
        $mahasiswa->delete(); //hapus data npm 2226250029
        dump($mahasiswa); //melihat isi $mahasiswa
    }

    public function selectElq(){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index',['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }
    
    public function allJoinElq(){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswas = Mahasiswa::has('prodi')->get();
        return view ('mahasiswa.index',['allmahasiswa' => $mahasiswas, 'kampus' => $kampus]);
    }
}


