<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $students = auth()->user()->students;
        return view('students.index', compact('students'));
    }
}
