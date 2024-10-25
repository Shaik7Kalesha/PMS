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
        return view('member.attendence');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'attendance_status' => 'required|in:present,absent',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new attendance record
        $attendance = Attendance::create([
            'student_name' => $request->student_name,
            'status' => $request->attendance_status,
            'date' => now(),
        ]);

        return response()->json([
            'success' => 'Attendance marked successfully!',
            'data' => [
                'id' => $attendance->id,
                'student_name' => $attendance->student_name,
                'status' => $attendance->attendance_status,
                'date' => $attendance->date->format('Y-m-d'),
            ],
        ]);
    }
    public function markAttendance(Request $request)
{
    $request->validate([
        'student_name' => 'required|string|max:255',
        'attendance_status' => 'required|in:present,absent',
    ]);

    // Assuming you have logic to find the student by name or ID
    $student = Student::where('name', $request->student_name)->first();

    if ($student) {
        $student->attendance_status = $request->attendance_status; // Use the correct column name
        $student->save();

        return response()->json(['success' => 'Attendance marked successfully!', 'data' => $student]);
    }

    return response()->json(['message' => 'Student not found'], 404);
}
}
