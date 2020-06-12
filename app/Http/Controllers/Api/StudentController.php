<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function gender(Request $request) {
        $students = config('students.students');
        $genders = config('students.genders');
        // Richiesta dati
        //$data = $request->all();
        $gender = $request->input('filter');
        $result = [
            'error' => '',
            'response' => []
        ];
        if (in_array($gender, $genders)) {
            if ($gender == 'all') {
                $result['response'] = $students;
            }
            else {
                foreach ($students as $student) {
                    if ($student['genere'] == $gender) {
                        $result['response'][] = $student;
                    }
                }
            }
        }
        else {
            $result['error'] = 'Filtro non disponibile';
        }
        return response()->json($result);
    }
}
