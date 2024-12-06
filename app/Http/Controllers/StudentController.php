<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use LDAP\Result;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('jurusan', 'user')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Tampilkan form tambah siswa.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Simpan data siswa baru.
     */
    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'fullname' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phonenumber' => 'required|string|max:15',
        'as' => 'required|in:admin,assessor,student',
        'nisn' => 'required_if:as,student|max:10',
        'grade_level' => 'required_if:as,student|integer',
        'major_id' => 'required_if:as,student|exists:jurusans,id',
        'password' => 'required|string|min:8',
    ]);

    // Simpan ke tabel users
    $user = User::create([
        'fullname' => $request->fullname,
        'name' => $request->name,
        'email' => $request->email,
        'nisn' => $request->nisn,
        'grade_level' => $request->grade_level,
        'major_id' => $request->major_id,
        'phonenumber' => $request->phonenumber,
        'as' => $request->as,
        'password' => bcrypt($request->password),
        'active' => $request->has('active') ? $request->active : 1,
    ]);

    // Simpan ke tabel students jika role adalah 'student'
    if ($request->as === 'student') {
        Student::create([
            'nisn' => $request->nisn,
            'grade_level' => $request->grade_level,
            'major_id' => $request->major_id,
            'user_id' => $user->id, // Relasi dengan user
        ]);
    }
        return redirect('manage')->with('success', 'Student created successfully.');
    }

    /**
     * Tampilkan detail siswa.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Tampilkan form edit siswa.
     */
    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    /**
     * Update data siswa.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nisn' => 'required|max:10|unique:students,nisn,' . $student->id,
            'grade_level' => 'required|integer',
            'major_id' => 'required|exists:jurusans,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Hapus siswa.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

public function showResults()
{
    // Ambil semua siswa dengan data user dan results
    $students = Student::with('user', 'results')->get();

    // Transformasi data: tambahkan properti `final_score` dan `status`
    $students = $students->map(function ($student) {
        // Hitung rata-rata nilai hasil ujian
        $finalScore = $student->results->avg('final_score') ?? 0; // Default ke 0 jika tidak ada hasil

        // Tentukan status berdasarkan nilai
        if ($finalScore >= 91) {
            $status = 'Sangat Kompeten';
        } elseif ($finalScore >= 75) {
            $status = 'Kompeten';
        } elseif ($finalScore >= 61) {
            $status = 'Cukup Kompeten';
        } else {
            $status = 'Belum Kompeten';
        }

        // Tambahkan properti baru ke objek
        $student->results->final_score = round($finalScore, 2);
        $student->results->status = $status;

        return $student;
    });

    return view('examination.result', compact('students'));
}
}
