<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'Bio Id' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'personal email' => ['required', 'string', 'personal email', 'max:255', 'unique:users'],
            'official email' => ['required', 'string', 'official email', 'max:255', 'unique:users'],
            'employee id' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'string', 'max:255'],
            'linked in' => ['required', 'string', 'max:255'],
            'portfolio' => ['required', 'string', 'max:255'],
            'mobile number' => ['required', 'string', 'max:255'],
            'tech stack' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'date of joining' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'Bio Id' =>$request->Bioid,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'personal email' => $request->personalemail,
            'official email' => $request->officialemail,
            'employee id' => $request->employeeid,
            'experience' => $request->experience,
            'linked in' => $request->linkedin,
            'portfolio' => $request->portfolio,
            'mobile number' => $request->mobilenumber,
            'tech stack' => $request->techstack,
            'designation' => $request->designation,
            'date of joining' => $request->dateofjoining,
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect()->route('login');
    }
}
