<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    public function index()
    {
        $students = StudentResource::collection(Student::all());
        return inertia('Students/Index', [
            'students' => $students
        ]);
    }

    public function show(Student $student)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(Student $student)
    {

    }

    public function update(Request $request, Student $student)
    {
        
    }
}