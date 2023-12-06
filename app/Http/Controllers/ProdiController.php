<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProdiController;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    //
    public function index()
    {
        // $kampus = "Universitas Multi Data Palembang";
        // return view('prodi.index')->with('kampus', $kampus);
        $prodis = Prodi::all();
        return view('prodi.index')->with('prodis', $prodis);
    }

    public function allJoinFacade()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select mahasiswas.*, prodis.nama as nama_prodi from prodis, mahasiswas
        where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus]);
    }
    public function allJoinElq()
    {
        $prodis = Prodi::with('mahasiswas')->get();
        foreach ($prodis as $prodi) {
            echo "<h3>{$prodi->nama}</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi->mahasiswas as $mhs) {
                echo $mhs->nama_mahasiswa . ", ";
            }
        }
        echo "<hr>";
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        // dump($request);
        // echo $request->nama;
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
            'foto' => 'required|file|image|max:5000',
        ]);
        // dump($validateData);
        // echo $validateData['nama'];

        //ambil ekstensi file
        $ext = $request->foto->getClientOriginalExtension();
        //rename nama file
        $nama_file = "Foto- " . time() . "." . $ext;
        $path = $request->foto->storeAs('public', $nama_file);

        $prodi = new Prodi(); //buat object prodi
        $prodi->nama = $validateData['nama']; //simpan nilai input($validateData['nama']) ke dalam property nama prodi ($prodi->nama)
        $prodi->foto = $nama_file;
        $prodi->save(); //simpan ke dalam tabel prodi

        //return "Data prodi $prodi->nama berhasil disimpan ke database"; //tampilkan pesan berhasil
        $request->session()->flash('info', "Data Prodi $prodi->nama berhasil disimpan ke database");
        return redirect()->route('prodi.index');
    }
    public function show(Prodi $prodi)
    {
        return view('prodi.show', ['prodi' => $prodi]);
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', ['prodi' => $prodi]);
    }

    public function update(Request $request, Prodi $prodi)
    {
        // dump($request->all());
        // dump($prodi)

        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);

        Prodi::where('id', $prodi->id)->update($validateData);
        $request->session()->flash('info', "Data Prodi $prodi->nama berhasil diubah");
        return redirect()->route('prodi.index');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with("info", "Prodi $prodi->nama berhasil dihapus.");
    }
}
