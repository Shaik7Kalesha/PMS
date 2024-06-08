<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;


class MemberController extends Controller
{
    
    public function reg_mem(){
        return view('member.member_register');
    }

    public function mem_list() {
        $members = Member::all();
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Members fetched successfully',
                'members' => $members
            ]);
        } else {
            return view('member.member_list');
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

        return response()->json(['message'=>'member added successfully']);
    }
}
