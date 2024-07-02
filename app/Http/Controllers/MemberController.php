<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

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
                $user->status = 'accepted';
                $user->save();
            } else {
                // If user does not exist, create a new user
                $newUser = new User();
                $newUser->name = $member->name;
                $newUser->email = $member->personalemail;
                $newUser->password = bcrypt($member->password); // Assuming the password is stored in a hashed form
                $newUser->usertype = $request->usertype;
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
            // Handle the rejection logic, for example, delete the member
            $member->delete();

            return response()->json(['message' => 'Member rejected successfully']);
        } else {
            return response()->json(['message' => 'Member not found'], 404);
        }
    }

}
