<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
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

    public function update(Request $request, $id)
    {
        // Validate the incoming request data as needed
        $validatedData = $request->validate([
            'bioid' => 'required|int',
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

        // Find the member by ID
        $member = Member::find($id);

        if ($member) {
            // Update member data
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

            // Save the updated member data
            $member->save();

            // Return success response
            return response()->json(['status' => 'success', 'message' => 'Member data updated successfully']);
        } else {
            // Return error response if member is not found
            return response()->json(['status' => 'error', 'message' => 'Member not found'], 404);
        }
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
                $user->member_id = $member->id;
                $user->save();
            } else {
                // If user does not exist, create a new user
                $newUser = new User();
                $newUser->name = $member->name;
                $newUser->email = $member->personalemail;
                $newUser->password = bcrypt($member->password); // Assuming the password is stored in a hashed form
                $newUser->usertype = $request->usertype;
                $newUser->member_id = $member->id;
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
    
            // Delete the member
            $user->delete();
    
            return response()->json(['message' => 'Member and associated user rejected successfully']);
        } else {
            return response()->json(['message' => 'Member not found'], 404);
        }
    }
    
    public function getUser()
    {
        // Retrieve member_id from the session
        $loggedUserId = Session::get('member_id');
        $user = Member::where('bioid', $loggedUserId)->first();
    
        if ($user) {
            // If user exists, store member_id in the session
            $users = $user->member_id;
            Session::put('member_id', $users);
    
            // Return JSON response
            return response()->json([
                'status' => 'success',
                'message' => 'User found',
                'member_id' => $users
            ]);
        } else {
            // Handle the case when the user is not found
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }
    }
    
    public function getUserView()
    {
        // Retrieve member_id from the session
        $users = Session::get('member_id');
        
        // Return the view with the member_id
        return view('member.student_assigned', compact('users'));
    }


    public function fetchstudent()
    {
        // Retrieve the member_id from the session
        $loggedin = session()->get('member_id');

        // Fetch students assigned to the logged-in member
        $studentlist = Student::where('member_id', $loggedin)->get();

        // Check if the request expects a JSON response
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Student list fetched successfully',
                'studentlist' => $studentlist,
            ]);
        } else {
            // Render the view with the student list
            return view('member.student_assigned', compact('studentlist'));
        }
    }
}
