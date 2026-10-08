<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with(['appointments' => function ($query) {
            $query->whereDate('appointment_date', '>=', today())
                ->orderBy('appointment_date');
        }])->get();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => ['required', 'string', 'unique:patients,student_id'],
            'name' => 'required',
            'course' => 'required',
            'year_level' => ['required', 'integer', 'min:1', 'max:8'],
        ]);

        Patient::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'student_id' => ['required', 'string', Rule::unique('patients', 'student_id')->ignore($patient->id)],
            'name' => 'required',
            'course' => 'required',
            'year_level' => ['required', 'integer', 'min:1', 'max:8'],
        ]);

        $patient->update([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
