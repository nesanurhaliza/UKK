<?php

namespace App\Http\Controllers;

use App\Models\Assessor;
use App\Models\Jurusan;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function auth(Request $request){
    $validata = $request->validate([
        'email' => ['required','email'],
        'password' => ['required'],


    ]);
    if (Auth::attempt($validata)) {
        // Jika login berhasil, redirect ke halaman dashboard
        return redirect('/manage');
    }

    // Jika login gagal, beri pesan error dan redirect kembali ke halaman login
    return redirect()->back()->withInput()->with('pesanlogin', 'Maaf, login gagal. Email atau password salah!');
    }
    public function user(Request $request){
        $data['user'] = User ::all();
        $data['total_user'] = $data['user']->count();

        return view('user',$data);

    }
    public function profile(){
        $data['user'] = User ::all();
        return view('profile',$data);
    }
    public function edit($id){
       $user = User::findOrFail($id);
       return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
       $validateData = request()->validate([
        'fullname' =>'required',
        'name' => 'required',
        'email' => 'required',
        'phonenumber' => 'required',
        'password' => 'required',
        'as' => 'required',
        'active' => 'required',
       ]);
       $user = User::findOrFail($id);
       $user->update($validateData);

       return redirect('manage')->with('succes', 'Data berhasil disimpan');
    }
    public function tambah(){
        $jurusans = Jurusan::all();
        return view('tambah', compact('jurusans'));

    }

    public function add(Request $request)
{
    // Validasi input data
    $validatedData = $request->validate([
        'fullname' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'phonenumber' => 'required',
        'as' => 'required',
        'active' => 'nullable|boolean',
        'password' => 'required|min:6',
        'nisn' => 'nullable|string',  // Validasi nisn
        'grade_level' => 'nullable|integer', // Validasi grade level
        'jurusan_id' => 'nullable|exists:jurusans,id'
        // Validasi jurusan// password lebih baik divalidasi
    ]);

    // Membuat user baru dengan data yang divalidasi
    $user = User::create([
        'fullname' => $validatedData['fullname'],
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'phonenumber' => $validatedData['phonenumber'],
        'as' => $validatedData['as'],
        'active' => $validatedData['active'] ?? 1, // default active ke 1 jika tidak ada input
        'password' => bcrypt($validatedData['password']), // pastikan password dienkripsi
    ]);

    // Menangani data spesifik berdasarkan role setelah user disimpan
    if ($validatedData['as'] === 'assessor') {
        Assessor::create([
            'user_id' => $user->id,
            'assessor_type' => $request->assessor_type,
            'description' => $request->description,
            'assessment_qualification' => $request->input('assessment_qualification'),
        ]);
    } elseif ($validatedData['as'] === 'student') {
        Student::create([
            'user_id' => $user->id,
            'nisn' => $validatedData['nisn'],
            'grade_level' => $validatedData['grade_level'],
            'jurusan_id' => $validatedData['jurusan_id'],
        ]);
    }


    $user->save();

    // Redirect ke halaman manage dengan pesan sukses
    return redirect('manage')->with('success', 'Pengguna berhasil ditambahkan');
}

    public function delete(Request $request){
        User::where('id',$request->id)->delete();
        return redirect('/manage');
    }
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('/manajementjurusan', compact('jurusan'));
    }

    public function manage()
{
    $users = User::all();
    $assessors = Assessor::with('user')->get();
    $students = Student::with(['user', 'jurusan'])->get(); // Assumsi tabel `majors` sudah dibuat

    return view('manage', compact('users', 'assessors', 'students'));
}




    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function jurusan()
    {
        return view('jurusan.Index');
    }
    public function manajemen()
    {
        return view('elemen.standar');
    }
}
