<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Projects;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;



class StudentController extends Controller
{
    //
    public function student_registration()
    {
        return view('student.student_register');
    }

    public function stu_list()
    {
        $students = Student::all();
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Students fetched successfully',
                'students' => $students,
            ]);
        } else {
            return view('student.student_list');
        }
    }
    public function store_student(Request $request)
    {
        $validatedData = $request->validate([
            'regno' => 'required',
            'name' => 'required|string|max:255', // Corrected validation rule for name
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:8',
            'department' => 'required|string|max:255',
            'batch_year' => 'required|string|max:255',
            'mentor_name' => 'required|string|max:255',
            'mentor_number' => 'required|string|max:255',
            'student_number' => 'required|string|max:255',

        ]);
        $student = new Student();
        $student->regno = $validatedData['regno'];
        $student->name = $validatedData['name']; // Use the plain name, not encrypted
        $student->email = $validatedData['email'];
        $student->password = $validatedData['password']; // Encrypt the password
        $student->department = $validatedData['department'];
        $student->batch_year = $validatedData['batch_year'];
        $student->mentor_name = $validatedData['mentor_name'];
        $student->mentor_number = $validatedData['mentor_number'];
        $student->student_number = $validatedData['student_number'];
        $student->save();
        return response()->json(['message' => 'Request sent successfully']);
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
                'message' => 'No Student Found.',
            ]);
        }

    }
    public function modify(Request $request, $id)
    {
        $validatedData = $request->validate([
            'member_id' => 'exists:members,bioid', // Ensure member_id exists in 'members' table
            'regno' => 'required|int',
            'name' => 'required|string|max:255',
            'email' => 'required|email|min:8',
            'password' => 'required|string|min:8',
            'department' => 'required|max:255',
            'batch_year' => 'required|string|max:255',
            'mentor_name' => 'required|string|max:255',
            'mentor_number' => 'required|max:255',
            'student_number' => 'required|max:255',
            'project_title' => 'required|string|max:255', // Ensure project_title is a string and not an ID
            'project_description' => 'required|string',
        ]);
    
        // Find the student by ID
        $student = Student::find($id);
    
        if (!$student) {
            \Log::error('Student not found with ID: ' . $id);
            return response()->json(['status' => 'error', 'message' => 'Student not found'], 404);
        }
    
        // Update student data
        $student->member_id = $request->member_id;
        $student->regno = $request->regno;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->department = $request->department;
        $student->batch_year = $request->batch_year;
        $student->mentor_name = $request->mentor_name;
        $student->mentor_number = $request->mentor_number;
        $student->student_number = $request->student_number;
        $student->project_title = $request->project_title;
        $student->project_description = $request->project_description;
    
        // Save the updated student data
        $student->save();
    
        // Log success and return response
        \Log::info('Student updated successfully: ' . $student->id);
        return response()->json(['status' => 'success', 'message' => 'Student data updated successfully']);
    }
    

    

    public function checkStatus()
    {
        // Fetch all batches
        $batchstatus = Batch::all();

        // Check if any batch is open
        $isOpen = $batchstatus->contains('status', 'open');

        if ($isOpen) {
            return view('student.student_register', compact('batchstatus', 'isOpen'));
        } else {
            return view('student.404');
        }
    }

    public function acceptStudent(Request $request, $id)
    {
        $student = Student::find($id);
    
        if ($student) {
            // Update student's status to 'accepted'
            $student->status = 'accepted';
            $student->save();
    
            // Add student to the users table with user_type as student
            $user = User::create([
                'name' => $student->name,
                'email' => $student->email,
                'password' => bcrypt($student->password), // Ensure password encryption
                'usertype' => 'student', // Set usertype to student
                // Add other fields as needed
            ]);
    
            return response()->json(['message' => 'Student accepted successfully.']);
        }
    
        return response()->json(['message' => 'Student not found.'], 404);
    }

    public function rejectStudent($id)
{
    // Find the student by ID
    $student = Student::find($id);

    if ($student) {
        // Update the student's status to 'rejected'
        $student->status = 'rejected';
        $student->save();

        // Find the associated user by email
        $user = User::where('email', $student->email)->first();

        // If the user exists, delete the user
        if ($user) {
            $user->delete();
        }

        return response()->json(['message' => 'Student and associated user rejected successfully']);
    } else {
        return response()->json(['message' => 'Student not found'], 404);
    }
}

    

    public function getMembers()
    {
        $members = Member::all();
        return response()->json(['getmember' => $members]);
    }

    public function getProjects()
    {
        $projects = Projects::all();
        return response()->json(['projects' => $projects]);
    }

   
}





