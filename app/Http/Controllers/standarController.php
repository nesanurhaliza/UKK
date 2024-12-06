<?php

namespace App\Http\Controllers;

use App\Models\Assessor;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use PhpParser\PrettyPrinter\Standard;
use App\Models\StandarKompetensi;

class standarController extends Controller
{

    public function standar(Request $request)
    {
        // Ambil semua data dari StandarKompetensi
        $standar = StandarKompetensi::all();

        // Kirim data ke view
        return view('manajement.standar', compact('standar'));
    }
        public function create(){
        $standar = StandarKompetensi::all();
        $jurusans = Jurusan::all();
        $assessors = Assessor::all();


        return view('manajement.createstandar', compact('standar','jurusans', 'assessors'));
    }
    // Menampilkan form untuk tambah Standar Kompetensi


    // Menyimpan data Standar Kompetensi
    public function addstandar(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'unit_code' => 'required',
            'unit_title' => 'required',
            'unit_deskripsi' => 'required',
            'jurusan_id' => 'required', // Relasi ke tabel 'jurusans'
            'assessor_id' => 'required',
        ]);

        // Simpan data Standar Kompetensi ke database
        StandarKompetensi::create($validated);

        // Redirect ke halaman daftar Standar Kompetensi dengan pesan sukses
        return redirect('manajement.standar')->with('succes','berhasil di edit');
      }
      public function edit($id)
      {
          $standar = StandarKompetensi::findOrFail($id); // Mengambil data standar berdasarkan ID
          $jurusans = Jurusan::all();
          $assessors = Assessor::all();// Mengambil semua data jurusan untuk pilihan dropdown
          return view('manajement.editstandar', compact('standar', 'jurusans', 'assessors'));
      }

      public function update(Request $request, $id)
      {
          $validated = $request->validate([
              'unit_code' => 'required',
              'unit_title' => 'required',
              'unit_deskripsi' => 'required',
              'jurusan_id' => 'required',
              'assessor_id' => 'required',
          ]);

          $standar = StandarKompetensi::findOrFail($id); // Mengambil data standar berdasarkan ID
          $standar->update($validated);
           // Mengupdate data standar dengan validasi

          return redirect('manajement.standar')->with('success', 'Standar Kompetensi berhasil diupdate!');
      }

    public function delete(Request $request){
        $standar = StandarKompetensi::find($request->id)->delete();
        return redirect('manajement.standar');
    }
    public function index()
    {
        // Memuat standar kompetensi beserta elemen yang terkait
        $standar = StandarKompetensi::with('elements')->get();

        return view('manajement.element', compact('standar'));
    }
    
}
