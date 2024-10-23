<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use App\Http\Resources\ClassesResource;
use App\Http\Resources\ClassResource;
use App\Models\Classes;

use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {

        $students = StudentResource::collection(Student::paginate(10));
        return inertia('Students/Index', [
            'students' => $students
        ]);
    }

    public function show(Student $student)
    {

    }

    public function create()
    {
        $classes = ClassResource::collection(Classes::all());

        return inertia('Students/Create', [
            'classes' => $classes
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {

    }

    public function update(Request $request, Student $student)
    {
        
    }
}
