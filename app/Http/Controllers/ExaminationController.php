<?php

namespace App\Http\Controllers;

use App\Models\Assessor;
use App\Models\CompetencyElement;
use App\Models\Examination;
use App\Models\Result;
use App\Models\StandarKompetensi;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationController extends Controller
{
    public function index()
    {
        $standar = StandarKompetensi::all(); // Mengambil semua data standar kompetensi
        return view('examinations.index', compact('standar'));
    }


    // Form untuk menambahkan ujian baru
    public function create()
    {
        $students = Student::all();
        $assessors = Assessor::all();
        $elements = CompetencyElement::all();
        $standar = StandarKompetensi::all();

        return view('examinations.create', compact('students', 'assessors', 'elements'));
    }

    // Menyimpan data ujian baru
    public function store(Request $request)
    {
        $request->validate([
            'exam_date' => 'required|date',
            'student_id' => 'required|exists:students,id',
            'assessor_id' => 'required|exists:assessors,id',
            'element_id' => 'required|exists:elements,id',
            'status' => 'required|integer',
            'comments' => 'nullable|string',
        ]);

        Examination::create($request->all());
        return redirect('examinations.index')->with('success', 'Ujian berhasil ditambahkan');
    }

    // Menampilkan detail ujian
    public function show(Examination $examination)
    {
        $examination->load(relations: ['student', 'assessor', 'element']);
        return view('examinations.show', compact('examination'));
    }

    // Form untuk mengedit data ujian
    public function edit(Examination $examination)
    {
        $students = Student::all();
        $assessors = Assessor::all();
        $elements = StandarKompetensi::with('standar_kompetensi')->get();
        return view('examinations.edit', compact('examination', 'students', 'assessors', 'elements'));
    }

    // Mengupdate data ujian
    public function update(Request $request, Examination $examination)
    {
        $request->validate([
            'exam_date' => 'required|date',
            'student_id' => 'required|exists:students,id',
            'assessor_id' => 'required|exists:assessors,id',
            'element_id' => 'required|exists:competency_elements,id',
            'status' => 'required|integer',
            'comments' => 'nullable|string',
        ]);

        $examination->update($request->all());
        return redirect()->route('examinations.index')->with('success', 'Ujian berhasil diperbarui');
    }

    // Menghapus data ujian
    public function destroy(Examination $examination)
    {
        $examination->delete();
        return redirect()->route('examinations.index')->with('success', 'Ujian berhasil dihapus');
    }
    public function showhasil(){
        $id = Auth::user()->assessor->id;
        $competencyStandard = StandarKompetensi::where('assessor_id', $id)->get();
        return view('assessor.laporan.pilihstandar', compact('competencyStandard'));
    }
    public function result(Request $request, $id)
    {
        // Validasi apakah standar kompetensi milik assessor
        $assessor_id = Auth::user()->assessor->id;

        $standard = StandarKompetensi::where('id', $id)
            ->where('assessor_id', $assessor_id)
            ->with('competency_elements')
            ->first();

        if (!$standard) {
            return back()->with('error', 'Standar kompetensi tidak ditemukan atau tidak berhak mengakses.');
        }

        // Ambil data ujian
        $examinations = Examination::where('standar_id', $id)->with('student.user')->get();

        // Kelompokkan berdasarkan student_id
        $students = $examinations->groupBy('student_id')->map(function ($exams) use ($standard) {
            $totalElements = $standard->competency_elements->count();
            $completedElements = $exams->where('status', 1)->unique('element_id')->count();

            $finalScore = $totalElements > 0 ? round(($completedElements / $totalElements) * 100) : 0;

            if ($finalScore >= 91) {
                $status = "Sangat Kompeten";
            } elseif ($finalScore >= 75) {
                $status = "Kompeten";
            } elseif ($finalScore >= 61) {
                $status = "Cukup Kompeten";
            } else {
                $status = "Belum Kompeten";
            }

            return [
                'student_id' => $exams->first()->student_id,
                'student_name' => $exams->first()->student->user->full_name,
                'final_score' => $finalScore,
                'status' => $status,
            ];
        });

        return view('assessor.laporan.hasilujian', compact('standard', 'students'));
    }
    public function showstandar(){
        $id = Auth::user()->assessor->id;
        $standar = StandarKompetensi::where('assessor_id', $id)->get();
        return view('examinations.index', compact(' standar'));
    }
    public function showsiswa($id)
    {

        $standars = StandarKompetensi::find($id);
        $standar_id = $standars->id;
        $students = Student::where('jurusan_id', $standars->jurusan_id)->get();


        return view('examinations.create', compact( 'standar_id', 'students'));
    }
    public function showelement(Request $request , $id, $standar_id){

        $element = CompetencyElement::where('competency_standard_id', $standar_id)->get();

        $student_id = $id;
        $element = CompetencyElement::where('competency_standard_id', $standar_id)->get();
        return view('examinations.menilai', compact('element', 'student_id', 'standar_id'));
    }

    public function addexamination(Request $request) {
        $student_id = $request->input('student_id');
        $standar_id = $request->input('standar_id');
        $statuses = $request->input('status'); // Array dengan format [element_id => status]
        // $assessor_id = $request->input('assessor_id');
        $assessor_id = Auth::user()->assessor->id;

        foreach ($statuses as $element_id => $status) {
            // Cek apakah data sudah ada

            $examination = Examination::firstOrNew([
                'student_id' => $student_id,
                'standar_id' => $standar_id,
                'element_id' => $element_id,
                // 'assessor_id' => $assessor_id,
            ]);

            // Update atau buat baru
            $examination->exam_date = now();
            $examination->assessor_id = $assessor_id;
            $examination->status = $status; // 1 = selesai, 0 = tidak selesai
            $examination->comments = 'Mantap'; // Sesuaikan dengan kebutuhan
            $examination->save();
        }

        return redirect('/examinations.result')->with('success', 'Data berhasil disimpan!');
    }

    public function results()
    {
        $id = Auth::user()->assessor->id;

        // Ambil semua data dari tabel students
        $students = Student::with('results')->get();
        $standar = StandarKompetensi::where('assessor_id', $id)->get();


        return view('examinations.result', compact('standar', 'students'));  // Perbaiki spasi di 'standar'

    }


    public function showResults() {

        $students = Student::with('user')->get(); // Contoh query
        return view('examinations.result', compact('students'));

    }


    public function determineStatus($finalScore)
{
    if ($finalScore >= 85) {
        return 'Sangat Kompeten';
    } elseif ($finalScore >= 70) {
        return 'Kompeten';
    } elseif ($finalScore >= 50) {
        return 'Cukup Kompeten';
    }

    return 'Tidak Kompeten';
}



}
