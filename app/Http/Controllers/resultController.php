<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class resultController extends Controller
{
    public function index()
    {
        // Ambil data hasil ujian beserta relasi dengan siswa
        $results = Result::with('student.user')->get();

        return view('/examinations.result', compact('results'));
    }
}
