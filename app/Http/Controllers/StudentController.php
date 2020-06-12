<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;
    private $genders;
    // Constructor
    public function __construct() {
        $this->students = config('students.students');
        $this->genders = config('students.genders');
    }
    // STUDENTES PAGE
    public function index() {
        $students = $this->students;
        $genders = $this->genders;
        return view('students.index', compact('students', 'genders'));
    }
    // STUDENT SHOW PAGE
    public function show($slug) {
        $student = $this->searchStudent($slug, $this->students);
        if (!$student) {
            abort('404');
        }
        return view('students.show', compact('student'));
    }
    // UTILITIES
    // Check students by ID
    private function searchStudent($slug, $array) {
        foreach ($array as $student) {
            if ($student['slug'] == $slug) {
                return $student;
            }
        }
        return false;
    }
}