<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;
use App\Models\Account;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $students = Student::all();
        $query = Student::query();
        if ($search) {
            $query->where('fname', 'like', '%' . $search . '%')
                ->orWhere('lname', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('age', 'like', '%' . $search . '%')
                ->orWhere('department', 'like', '%' . $search . '%')
                ->orWhere('yr_level', 'like', '%' . $search . '%')
                ->orWhere('adviser', 'like', '%' . $search . '%');
        }
        $students = $query->get();

        return Inertia::render('Account/Students/Index', [
            'students' => $students,
            'search' => $search,
        ])->withViewData(['search' => $search]);
    }

    public function create()
    {
        return Inertia::render('Account/Students/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'age' => 'required|string',
            'address' => 'required|string',
            'department' => 'required|string',
            'yr_level' => 'required|string',
            'adviser' => 'required|string',
        ]);
        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return Inertia::render('Students/Edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'age' => 'required|string',
            'address' => 'required|string',
            'department' => 'required|string',
            'yr_level' => 'required|string',
            'adviser' => 'required|string',
        ]);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $id)
    {
        $id->delete();

        return redirect()->route('students.index')->with('success', 'Student Deleted Successfully.');
    }
    
    public function generate(Student $student) {
      
        $pdf = PDF::loadView('pdf.student', [
            'student' => $student
        ]);

        return $pdf->stream();
    }
}
