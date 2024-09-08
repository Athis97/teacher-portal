<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subject' => 'required',
            'marks' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput()
                ->with('method', 'POST');
        }

        $student = auth()->user()?->students()->where('name', $request->name)->first();

        if (!$student) {
            $data['name'] = $request->name;
            $data['teacher_id'] = auth()->id();

            auth()->user()->students()->create($data);
        }

        $details = StudentDetail::where('student_id', $student->id)->where('subject', $request->subject)->first();

        if ($details) {
            $details->update(['marks' => $request->marks]);
        } else {
            StudentDetail::create(['subject' => $request->subject, 'marks' => $request->marks]);
        }

        return redirect()->back()->with('success', 'Student created successfully.');
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subject' => 'required',
            'marks' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput()
                ->with('method', 'PUT');
        }

        $student->update($request->all());

        return redirect()->back()->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully.');
    }
}
