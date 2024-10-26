<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class LoginController extends Controller
{
    //
    public function home(){
        return view('home.index');
    }
    public function index(){
        if(Auth::id()){
            $user_type=Auth()->user()->usertype;
            if($user_type=="admin"){
                return view('admin.adminhome');
            }elseif($user_type=="student"){
                return view('student.fetchtask');
            }
            elseif($user_type=="member"){
                return view('member.student_assigned');
            }
            elseif($user_type=="tl"){
                return view('tl.tlhome');
            }
            elseif($user_type=="faculty"){
                return view('faculty.facultyhome');
            }
            else{
                return "error";
            }
        }
    }
    
}