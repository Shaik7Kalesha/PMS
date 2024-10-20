<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\Student;

class AttendenceController extends Controller
{
    public function showForm()
    {
        $students = Student::all(); // Fetch all registered students
        $attendances = Attendence::with('student')->get(); // Fetch attendance records with student names
        return view('member.attendence', compact('students', 'attendances'));
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'attendance_status' => 'required|in:present,absent',
        ]);a

        // Save the attendance record
        $attendance = new Attendence();
        $attendance->student_name = $request->input('student_name');
        $attendance->status = $request->input('attendance_status');
        $attendance->date = now(); // or use a specific date
        $attendance->save();

        // Redirect or return a response
        return redirect()->route('attendance.form')->with('success', 'Attendance marked successfully!');
    }
}
