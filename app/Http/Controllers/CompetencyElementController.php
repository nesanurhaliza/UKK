<?php

namespace App\Http\Controllers;

use App\Models\CompetencyElement;
use App\Models\StandarKompetensi;
use Illuminate\Http\Request;
use Termwind\Components\Element;

class CompetencyElementController extends Controller
{
    public function index()
    {
        $elements = CompetencyElement::all();
        return view('manajement.element', compact('elements'));
    }

    // Form tambah competency element
    public function create()
    {
        $standar = StandarKompetensi::all();
        return view('manajement.createelement', compact('standar'));
    }

    // Simpan competency element baru
    public function addelement(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'criteria' => 'required|array|min:1', // Validasi untuk array criteria
            'competency_standard_id' => 'required|exists:standar_kompetensi,id', // Validasi untuk competency standard ID
        ]);

        // Simpan setiap criteria yang ada di array
        foreach ($validatedData['criteria'] as $criteria) {
            CompetencyElement::create([
                'criteria' => $criteria,
                'competency_standard_id' => $validatedData['competency_standard_id'],
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect('manajement.element')->with('success', 'Competency Element berhasil ditambahkan.');
    }
    public function edit($id)
    {
    $element = CompetencyElement::findOrFail($id);
    return view('manajement.editelement', compact('element'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'criteria' => 'required|string|max:255',
    ]);

    $element = CompetencyElement::findOrFail($id);
    $element->criteria = $request->input('criteria');
    $element->save();

    return redirect('manajement.element')
        ->with('success', 'Elemen berhasil diperbarui.');
}

    public function destroy($id)
    {
    $element = CompetencyElement::findOrFail($id);
    $element->delete();

    return redirect()->route('manajement.element')
        ->with('success', 'Elemen berhasil dihapus.');
    }




    public function getElements($standardId)
{
    $elements = CompetencyElement::where('standard_id', $standardId)->get();

    return response()->json($elements);
}

}
