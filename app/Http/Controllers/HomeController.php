<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $students = auth()->user()->students()->with('details');

        $data = [];

        if (isset($request->sort)) {
            if ($request->sort) {
                $students = $students->orderBy('marks');
            } else {
                $students = $students->orderByDesc('marks');
            }
            $data['sort'] = (bool) $request->sort;
        } else {
            $students = $students->latest();
            $data['sort'] = false;
        }

        $data['students'] = $students->paginate(10);

        // dd($data['students']);
        return view('students.index', $data);
    }
}
