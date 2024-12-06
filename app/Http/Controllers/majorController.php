<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class majorController extends Controller
{
    public function jurusan(Request $request){
      $jurusans = Jurusan::all();
      return view('jurusan.Index', compact('jurusans'));
      
    }
    public function createjurusan(){
        $jurusan = Jurusan::all();
        return view('jurusan.create');
    }
    public function addjurusan(Request $request){
        $validateData = $request->validate([
            'nama_jurusan' => 'required',
            'desc' => 'required',
        ]);
        Jurusan::create([
            'nama_jurusan' => $request->input('nama_jurusan'),
            'desc' => $request->input('desc'),
        ]);
        return redirect('jurusan.index')->with('succes','Jurasan berhasil ditambahkan');
    }
    public function delete(Request $request){
        $jurusan = Jurusan::find($request->id)->delete();
        return redirect('jurusan.index');
    }
    public function edit($id){
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }
    public function update(Request $request, $id){
        $validateData = $request->validate([
            'nama_jurusan' => 'required',
            'desc' => 'required',
        ]);
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($validateData);

        return redirect('jurusan.index')->with('succes','Jurusan di perbaharui');
    }
}
