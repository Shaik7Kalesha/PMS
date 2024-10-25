<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User; // Make sure to import the User model
use App\Models\Project;
use App\Models\Member;
use App\Models\Tasks;
use Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



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
            // 'member_id' => 'required|string|max:255',
            // 'project_title' => 'required|string|max:255',
            // 'project_description' => 'required|string|max:255',

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
        // $student->member_id = $validatedData['member_id'];
        // $student->project_title = $validatedData['project_title'];
        // $student->project_description = $validatedData['project_description'];
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
    // public function updateStudent(Request $request)
    // {
    //     // Find the student by their current regno
    //     $student = Student::where('regno', $request->regno)->first();
    
    //     if (!$student) {
    //         return response()->json(['status' => 'error', 'message' => 'Student not found'], 404);
    //     }
    
    //     // Check if the new regno is different and already exists
    //     if ($request->has('new_regno') && $request->new_regno != $student->regno) {
    //         $existingStudent = Student::where('regno', $request->new_regno)->first();
    //         if ($existingStudent) {
    //             return response()->json(['status' => 'error', 'message' => 'Duplicate regno found'], 400);
    //         }
    
    //         // If the new regno is valid, we can update it
    //         $student->regno = $request->new_regno;
    //     }
    
    //     // Create an array to hold the update values
    //     $updateData = [];
    
    //     // Check for each field and only update if it is present in the request
    //     if ($request->has('name')) {
    //         $updateData['name'] = $request->name;
    //     }
    //     if ($request->has('email')) {
    //         $updateData['email'] = $request->email;
    //     }
    //     if ($request->has('department')) {
    //         $updateData['department'] = $request->department;
    //     }
    //     if ($request->has('batch_year')) {
    //         $updateData['batch_year'] = $request->batch_year;
    //     }
    //     if ($request->has('mentor_name')) {
    //         $updateData['mentor_name'] = $request->mentor_name;
    //     }
    //     if ($request->has('mentor_number')) {
    //         $updateData['mentor_number'] = $request->mentor_number;
    //     }
    //     if ($request->has('student_number')) {
    //         $updateData['student_number'] = $request->student_number;
    //     }
    //     if ($request->has('member_id')) {
    //         $updateData['member_id'] = $request->member_id;
    //     }
    //     if ($request->has('project_title')) {
    //         $updateData['project_title'] = $request->project_title;
    //     }
    //     if ($request->has('project_description')) {
    //         $updateData['project_description'] = $request->project_description;
    //     }
    
    //     // Update the student's details with the dynamic data
    //     $student->update($updateData);
    
    //     // If regno was updated, save the student object to update regno in the database
    //     if (isset($request->new_regno)) {
    //         $student->regno = $request->new_regno;
    //         $student->save();
    //     }
    
    //     return response()->json(['status' => 'success', 'message' => 'Student updated successfully']);
    // }
    
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

    // public function acceptStudent($id, Request $request)
    // {
    //     $student = Student::find($id);
    //     if ($student) {
    //         // Create a new user from the student data
    //         $user = new User();
    //         $user->name = $student->name;
    //         $user->email = $student->email;
    //         $user->password = bcrypt($request->input('password')); // Ensure you handle password securely
    //         $user->usertype = 'student'; // Set user type as 'student
    //         $user->save();
    
    //         return response()->json(['message' => 'Student accepted and stored in users table successfully!'], 200);
    //     }
    
    //     return response()->json(['message' => 'Student not found!'], 404);
    // }
    

    // Reject a student
    // public function rejectStudent($id, Request $request)
// 
//     $student = Student::find($id);
//     if ($student) {
//         // Assuming the user is linked to the student by a foreign key, for example, student_id
//         $user = User::where('email', $student->email)->first(); // Adjust the condition as necessary

//         if ($user) {
//             // Remove the user record
//             $user->delete();
//         }

//         // Remove the student record
//         $student->delete();

//         return response()->json(['message' => 'Student rejected and removed successfully!'], 200);
//     }

//     return response()->json(['message' => 'Student not found!'], 404);
// }


    // public function getMembers()
    // {
    //     $members = Member::all();
    //     return response()->json(['getmember' => $members]);
    // }

//     public function getProjects()
// {
//     $projects = Project::where('status', 'accepted')->get();
//     return response()->json(['projects' => $projects]);
// }


    public function addTask(Request $request)
    {
        $request->validate([
            'taskName' => 'required|string|max:255',
            'taskTitle' => 'required|string|max:255',
            'taskDescription' => 'required|string',
            'taskDate' => 'required|date',
            'taskEta' => 'required|date_format:H:i',
            'studentId' => 'required|integer|exists:students,id',
        ]);

        $task = new Tasks();
        $task->name = $request->taskName;
        $task->title = $request->taskTitle;
        $task->description = $request->taskDescription;
        $task->date = $request->taskDate;
        $task->eta = $request->taskEta;
        $task->student_id = $request->studentId;
        $task->member_id = Auth::id();  // Assuming member is authenticated user
        $task->save();

        return response()->json(['success' => true]);
    }

    public function gettask_student()
    {
        return view('student.tasks');
    }

    public function fetchStudent1()
{
    $students = Student::all(); // Fetch all students from the database
    
    if (request()->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Students fetched successfully',
            'studentlist' => $students,
        ]);
    } else {
        return view('member.stu_attend', compact('students'));
    }
}


    // In StudentController.php
public function markAttendance(Request $request) {
    $student = Student::find($request->id);

    if ($student) {
        $student->attendance_status = $request->status; // Store attendance status
        $student->save();

        return response()->json(['message' => 'Attendance updated successfully']);
    } else {
        return response()->json(['message' => 'Student not found'], 404);
    }
}

public function studentList(Request $request)
{
    // Fetch all students
    $students = Student::all();

    // If the request is expecting a JSON response (usually for AJAX requests)
    if ($request->expectsJson() || $request->ajax()) {
        return response()->json(['students' => $students], 200);
    }

    // Otherwise, return the view with the student data
    return view('student.student_list', compact('students'));
}

// Accept a student (by ID) and add them to the users table
public function acceptStudent($id)
{
    $student = Student::find($id);

    if ($student) {
        // Create a new user entry using student data
        $user = new User();
        $user->name = $student->name;
        $user->email = $student->email;
        $user->password = bcrypt('defaultPassword'); // You may want to set a default password or send a welcome email to set a password
        $user->usertype = 'student'; // Optional: specify a role if needed
        $user->save();

        // Update student status to 'accepted'
        $student->status = 'accepted';
        $student->save();

        return response()->json(['message' => 'Student accepted and moved to users table successfully.']);
    } else {
        return response()->json(['message' => 'Student not found.'], 404);
    }
}

public function rejectStudent($id)
{
    $student = Student::find($id);

    if ($student) {
        // Find and delete the corresponding user
        $user = User::where('email', $student->email)->first(); // Assuming email is the common field to link students to users

        if ($user) {
            $user->delete(); // Delete the user from the database
        }

        $student->delete(); // Delete the student from the students table

        return response()->json(['message' => 'Student rejected and deleted successfully.']);
    } else {
        return response()->json(['message' => 'Student not found.'], 404);
    }
}

 // Edit student data (fetch for modal)
 public function editStudent($id)
 {
     $student = Student::find($id);

     if ($student) {
         return response()->json(['student' => $student]);
     } else {
         return response()->json(['message' => 'Student not found.'], 404);
     }
 }

 // Update student (for form submission)
 public function updateStudent(Request $request, $id)
 {
     $student = Student::find($id);

     if ($student) {
         // Validate input data
         $request->validate([
             'regno' => 'required',
             'name' => 'required',
             'email' => 'required|email',
             'department' => 'required',
             'batch_year' => 'required|integer',
             'mentor_name' => 'required',
             'mentor_number' => 'required',
             'student_number' => 'required',
             'member_id' => 'nullable',
             'project_title' => 'nullable',
             'project_description' => 'nullable'
         ]);

         // Update student data
         $student->regno = $request->regno;
         $student->name = $request->name;
         $student->email = $request->email;
         $student->department = $request->department;
         $student->batch_year = $request->batch_year;
         $student->mentor_name = $request->mentor_name;
         $student->mentor_number = $request->mentor_number;
         $student->student_number = $request->student_number;
         $student->member_id = $request->member_id;
         $student->project_title = $request->project_title;
         $student->project_description = $request->project_description;

         $student->save();

         return response()->json(['message' => 'Student updated successfully.']);
     } else {
         return response()->json(['message' => 'Student not found.'], 404);
     }
 }

 // Fetch available members for assignment
 public function getMembers()
 {
     $members = Member::all();
     return response()->json(['getmember' => $members], 200);
 }

 // Fetch available projects for assignment
 public function getProjects()
 {
     $projects = Project::where('status', 'accepted')->get();
     return response()->json(['projects' => $projects], 200);
 }


 public function getstudents()
    {
        $students = Student::all();
        return response()->json(['students' => $students]);

    }
}





