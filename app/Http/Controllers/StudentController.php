<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {

        $data = Students::all(); // Displays all data.
        // $data = Students::where('first_name','like', '%bert%')->get();

        return view('students.index');
    }
}
