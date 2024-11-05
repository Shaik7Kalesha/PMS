<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = User::select('id', 'name', 'usertype')
            ->where('id', auth()->id())
            ->first();

        if ($profile) {
            return view('student.profile', compact('profile'));

        } else {
            return response()->json([
                'success' => true,
                'message' => 'Profile fetched successfully',
                'data' => $profile,
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        // Validate the request for the image
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', // Allow certain image types
        ]);
    
        // Find the user by ID
        $user = User::find($id);
    
        // Check if the user exists
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }
    
        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile image if it exists (and isn't the default)
            if ($user->profile_picture && $user->profile_picture !== 'images/profile-default-image.jpg') {
                $oldImagePath = public_path($user->profile_picture);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }
    
            // Generate a unique file name
            $filename = time() . '.' . $request->profile_picture->extension();
    
            // Store the file in the 'images' folder within the public directory
            $path = $request->file('profile_picture')->move(public_path('images'), $filename);
    
            // Update the user record with the new path
            $user->profile_picture = 'images/' . $filename; // Save the relative path
        }
    
        // Save the user record
        $user->save();
    
        return response()->json(['success' => true, 'message' => 'Profile picture updated successfully.']);
    }
    
    
}
