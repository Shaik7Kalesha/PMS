<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Project;
use App\Models\Tasks;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\projects;
use Illuminate\Support\Facades\Session;



class MemberController extends Controller
{

    public function reg_mem()
    {
        return view('member.member_register');
    }

    public function mem_list()
    {
        $members = Member::all();
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Members fetched successfully',
                'members' => $members,
            ]);
        } else {
            return view('member.member_list', compact('members'));
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bioid' => 'required|int:11',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'personal_email' => 'required|email|max:255',
            'official_email' => 'required|email|max:255',
            'employee_id' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'linkedin' => 'required|url|max:255',
            'portfolio' => 'required|url|max:255',
            'mobile_number' => 'required|string|max:255',
            'tech_stack' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'date_of_joining' => 'required|date',
        ]);

        $member = new Member();
        $member->bioid = $request->bioid;
        $member->name = $request->name;
        $member->password = bcrypt($request->password); // Encrypt the password
        $member->personalemail = $request->personal_email;
        $member->officialemail = $request->official_email;
        $member->employeeid = $request->employee_id;
        $member->experience = $request->experience;
        $member->linkedin = $request->linkedin;
        $member->portfolio = $request->portfolio;
        $member->mobilenumber = $request->mobile_number;
        $member->techstack = $request->tech_stack;
        $member->designation = $request->designation;
        $member->dateofjoining = $request->date_of_joining;

        $member->save();

        return response()->json(['message' => 'member added successfully']);
    }

    public function edit($id)
    {
        $member = Member::find($id);
        if ($member) {
            return response()->json([
                'status' => 200,
                'member' => $member,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Member Found.',
            ]);
        }

    }

    public function update(Request $request, $bioid)
    {
        // Find the member by bioid
        $member = Member::where('bioid', $bioid)->first();

        // Check if member exists
        if (!$member) {
            return response()->json(['status' => 'error', 'message' => 'Member not found.'], 404);
        }

        // Update member data
        $member->update([
            'name' => $request->input('name'),
            'personalemail' => $request->input('personal_email'),
            'officialemail' => $request->input('official_email'),
            'employeeid' => $request->input('employee_id'),
            'experience' => $request->input('experience'),
            'linkedin' => $request->input('linkedin'),
            'portfolio' => $request->input('portfolio'),
            'mobilenumber' => $request->input('mobile_number'),
            'techstack' => $request->input('tech_stack'),
            'designation' => $request->input('designation'),
            'dateofjoining' => $request->input('date_of_joining'),
        ]);

        return response()->json(['status' => 'success', 'message' => 'Member data updated successfully!']);
    }


    public function acceptMember(Request $request, $id)
    {
        // Find the member by ID
        $member = Member::find($id);

        if ($member) {
            // Check if a user already exists for this member
            $user = User::where('email', $member->personalemail)->first();

            if ($user) {
                // If user already exists, update the user details
                $user->name = $member->name;
                $user->usertype = $request->usertype;
                $user->member_id = $member->bioid;
                $user->save();
            } else {
                // If user does not exist, create a new user
                $newUser = new User();
                $newUser->name = $member->name;
                $newUser->email = $member->personalemail;
                $newUser->password = bcrypt($member->password); // Assuming the password is stored in a hashed form
                $newUser->usertype = $request->usertype;
                $newUser->member_id = $member->bioid;
                $newUser->save();
            }

            // Update member status to "accepted"
            $member->status = 'accepted';
            $member->save();

            // Customize the success message based on user type
            $message = ($request->input('usertype') == 'tl') ? 'TL added and stored successfully' : 'Member added and stored successfully';

            return response()->json(['message' => $message], 200);
        } else {
            return response()->json(['message' => 'Member not found'], 404);
        }
    }



    public function rejectMember($id)
    {
        // Find the member by ID
        $member = Member::find($id);

        if ($member) {
            // Find the associated user by email
            $user = User::where('email', $member->personalemail)->first();

            // If the user exists, delete the user
            if ($user) {
                $user->delete();
            }

            // Update the member's status to "rejected"
            $member->status = 'rejected'; // Assuming there's a 'status' column in the Member table
            $member->save();

            return response()->json(['message' => 'Member status updated to rejected and associated user deleted successfully']);
        } else {
            return response()->json(['message' => 'Member not found'], 404);
        }
    }


    public function getUser()
    {
        // Retrieve member_id from the session
        $loggedUserId = Session::get('member_id');

        if (!$loggedUserId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Session member_id not found'
            ], 404);
        }

        // Retrieve the user by bioid
        $user = Member::where('bioid', $loggedUserId)->first();

        if ($user) {
            // Store member_id in the session if user is found
            Session::put('member_id', $user->member_id);

            return response()->json([
                'status' => 'success',
                'message' => 'User found',
                'member_id' => $user->member_id
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }
    }

    public function getUserView()
    {
        // Retrieve member_id from the session
        $memberId = Session::get('member_id');

        if (!$memberId) {
            return response()->json(['status' => 'error', 'message' => 'Member ID not found in session']);
        }

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully fetched the user',
            'member_id' => $memberId
        ]);
    }

    public function fetchstudent()
    {
        // Retrieve the member_id from the session
        $loggedin = session()->get('member_id');

        if (!$loggedin) {
            return response()->json(['status' => 'error', 'message' => 'Member ID not found in session']);
        }

        // Fetch students assigned to the logged-in member
        $studentlist = Student::where('member_id', $loggedin)->get();

        // Return the response based on request type
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Student list fetched successfully',
                'studentlist' => $studentlist,
            ]);
        } else {
            return view('member.student_assigned', compact('studentlist'));
        }
    }

    public function add_task(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'exists:students,id',
            'member_id' => 'exists:members,bioid',
            'title' => 'required|string',
            'description' => 'required|string',
            'task_name' => 'required|string',
            'task_date' => 'required|date',
            'eta' => 'required|date',
            // 'completed_date' => 'date',
            'status' => 'required|string',
        ]);

        $task = new Tasks();
        $task->student_id = $validatedData['student_id'];
        $task->member_id = $validatedData['member_id'];
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->task_name = $validatedData['task_name'];
        $task->task_date = $validatedData['task_date'];
        $task->eta = $validatedData['eta'];
        // $task->completed_date = $validatedData['completed_date'];
        $task->status = $validatedData['status'];
        $task->save();

        return response()->json(['success' => true, 'message' => 'Task added successfully']);
    }
    

    // app/Http/Controllers/YourController.php

    public function fetchProject($studentId)
{
    // Fetch the student's project details based on their ID
    $student = Student::with('project')->find($studentId);

    if ($student && $student->project) {
        return response()->json([
            'success' => true,
            'project' => [
                'title' => $student->project->title,
                'description' => $student->project->description,
            ]
        ]);
    } else {
        return response()->json(['success' => false]);
    }
}  
}
