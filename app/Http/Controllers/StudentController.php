<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    public function student_registration(){
        return view('student.student_register');
    }

    public function stu_list() {
        $students = Student::all();
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Students fetched successfully',
                'students' => $students
            ]);
        } else {
            return view('student.student_list');
        }
    }
    public function store_student(Request $request){
        $validatedData=$request->validate([
            'regno'=>'required',
            'name' => 'required|string|max:255', // Corrected validation rule for name
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:8',
            'department' => 'required|string|max:255',
            'batch_year' => 'required|string|max:255',
            'mentor_name' => 'required|string|max:255',
            'mentor_number' => 'required|string|max:255',
            'student_number' => 'required|string|max:255',

        ]);
        $student=new Student();
        $student->regno=$validatedData['regno'];
        $student->name = $validatedData['name']; // Use the plain name, not encrypted
        $student->email = $validatedData['email'];
        $student->password = $validatedData['password']; // Encrypt the password
        $student->department =$validatedData['department'];
        $student->batch_year = $validatedData['batch_year'];
        $student->mentor_name = $validatedData['mentor_name'];
        $student->mentor_number = $validatedData['mentor_number'];
        $student->student_number = $validatedData['student_number'];
        $student->save();
        return response()->json(['message'=>'student added successfully']);
    }

    public function check($id)
    {
        $student = student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }

    } 
    public function modify(Request $request,$id)
    {
        // Validate the incoming request data as needed
        $validatedData = $request->validate([
            'regno' => 'required|int:11',
            'name' => 'required|string|max:255',
            'email' => 'required|email|min:8',
            'password' => 'required|string|min:8',
            'department' => 'required|max:255',
            'batch_year' => 'required|string|max:255',
            'mentor_name' => 'required|string|max:255',
            'mentor_number' => 'required|max:255',
            'student_number' => 'required|max:255',
        ]);

        // Find the student by ID
        $student = Student::find($id);

        if ($student) {
            // Update student data
            $student->regno = $request->regno;
            $student->name = $request->name;
            $student->email =  $request->email;
            $student->password = bcrypt($request->password); // Encrypt the password
            $student->department = $request->department;
            $student->batch_year = $request->batch_year;
            $student->mentor_name = $request->mentor_name;
            $student->mentor_number = $request->mentor_number;
            $student->student_number = $request->student_number;
    
            
            // Save the updated student data
            $student->save();

            // Return success response
            return response()->json(['status' => 'success', 'message' => 'Student data updated successfully']);
        } else {
            // Return error response if student is not found
            return response()->json(['status' => 'error', 'message' => 'Student not found'], 404);
        }
    }
    public function takeStudent($id)
    {
        // Your logic to accept the student
        $student = student::find($id);
        if ($student) {
            $student->status = 'accepted';
            $student->save();

            return response()->json(['message' => 'Student accepted successfully.']);
        }

        return response()->json(['error' => 'Student not found.'], 404);
    }

    public function removeStudent($id)
    {
        $student = student::find($id);
        
        if ($student) {
            // Perform the rejection logic here
            $student->status = 'rejected';
            $student->save();
    
            return response()->json(['message' => 'Student has been rejected.']);
        } else {
            return response()->json(['message' => 'Student not found.'], 404);
        }
    }

}



