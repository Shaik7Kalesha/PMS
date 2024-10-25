<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // This is the important line
use App\Models\Leave;

class LeaveController extends Controller
{
    public function showForm()
    {
        return view('member.leave');  // This will return the 'leave.blade.php' view
    }
    public function submitRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bio_id' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'reason' => 'required|string',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save the leave request to the database
        $leaveRequest = new Leave();
        $leaveRequest->bio_id = $request->bio_id;
        $leaveRequest->designation = $request->designation;
        $leaveRequest->reason = $request->reason;
        $leaveRequest->date = $request->date;
        $leaveRequest->save();

        return redirect()->back()->with('success', 'Leave request submitted successfully!');
    }
    public function index()
    {
        // Fetch all leave requests
        $leaveRequests = LeaveRequest::all(); // You can also add pagination if needed

        return view('admin.leaverequest', compact('leaveRequests'));
    }
}
