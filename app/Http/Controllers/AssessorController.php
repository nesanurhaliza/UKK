<?php

namespace App\Http\Controllers;

use App\Models\Assessor;
use App\Models\User;
use Illuminate\Http\Request;

class AssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $assessors = Assessor::all();
    //     return view('assessors.index', compact('assessors'));
    // }
    public function index()
    {
        return view('dashboardassessor');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('assessors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'assessor_type' => 'required|in:internal,external',
            'description' => 'nullable|string',
        ]);

        $user = User::create([
            'assessor_type' => $request->assessor_type,
            'descpription' => $request->descpription,

        ]);

        if ($request->as === 'assessor') {
            Assessor::create([
                'assessor_type' => $request->assessor_type,
                'description' => $request->description,

            ]);
        }

        // Redirect atau kembalikan respons

        return redirect('manage')->with('success', 'Assessor added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('assessors.show', compact('assessor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('assessors.edit', compact('assessor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assessor $assessor)
    {
        $validated = $request->validate([
            'assessor_type' => 'required|in:internal,external',
            'description' => 'nullable|string',
        ]);

        $assessor->update($validated);

        return redirect()->route('assessors.index')->with('success', 'Assessor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessor $assessor)
    {
        $assessor->delete();

        return redirect()->route('assessors.index')->with('success', 'Assessor deleted successfully');

    }
    public function dashboardassessor(){
        return view('dashbordassessor');
    }
}
