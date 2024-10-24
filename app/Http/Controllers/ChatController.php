<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function chat()
    {
        $loggedInUser = Auth::user(); // Get the logged-in user
        $users = User::all(); // Get all users for admin

        return view('home.chat', compact('users', 'loggedInUser'));
    }

    public function fetchContacts(Request $request)
{
    \Log::info('User is checking fetchContacts', ['user' => Auth::user()]);

    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

    $loggedInUser = Auth::user();
    \Log::info('Logged in user', ['usertype' => $loggedInUser->usertype]);

    if (!$loggedInUser->usertype) {
        return response()->json(['success' => false, 'message' => 'User type not found'], 400);
    }

    // Fetch all users
    $users = User::all();
    $contacts = collect(); // Initialize an empty collection to hold contacts

    // Filter based on usertype
    switch ($loggedInUser->usertype) {
        case 'user':
            // Show the admin if the logged-in user is a regular user
            $contacts = $users->filter(function ($user) {
                return $user->usertype === 'admin';
            });
            break;

        case 'admin':
            // Show regular users if the logged-in user is an admin
            $contacts = $users->filter(function ($user) {
                return $user->usertype !== 'admin';
            });
            break;

        case 'member':
            // If logged-in user is a member, show all students
            $contacts = $users->filter(function ($user) {
                return $user->usertype === 'student';
            });
            break;

        case 'student':
            // If logged-in user is a student, show all members
            $contacts = $users->filter(function ($user) {
                return $user->usertype === 'member';
            });
            break;

        default:
            return response()->json(['success' => false, 'message' => 'Invalid user type'], 400);
    }

    return response()->json([
        'success' => true,
        'data' => $contacts->values(),
    ]);
}




}
