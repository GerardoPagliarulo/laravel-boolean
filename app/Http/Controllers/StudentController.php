<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;
    // Constructor
    public function __construct() {
        $this->students = config('students');
    }
    // STUDENTES PAGE
    public function index() {
        $students = $this->students;
        return view('students.index', compact('students'));
    }
    // STUDENT SHOW PAGE
    public function show($id) {
        $student = $this->searchStudent($id, $this->students);
        if (!$student) {
            abort('404');
        }
        return view('students.show', compact('student'));
    }
    // UTILITIES
    // Check students by ID
    private function searchStudent($id, $array) {
        foreach ($array as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return false;
    }
}