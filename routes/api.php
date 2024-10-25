<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getusers',[LoginController::class,'getusers']);
Route::get('/homepage',[LoginController::class,'index']);
Route::get('/getusers',[LoginController::class,'getusers']);
require __DIR__.'/auth.php';


//adminpart
Route::get('/add_role',[AdminController::class,'add_role'])->name('addroles');
Route::post('/createroles',[AdminController::class,'store_role'])->name('add_roles');
Route::get('/getroles',[AdminController::class,'getrole'])->name('getrole');


Route::get('/add_team',[AdminController::class,'add_team'])->name('addteams');
Route::post('/createteams',[AdminController::class,'store_team'])->name('add_teams');
Route::get('/getteams',[AdminController::class,'getteam'])->name('getteam');


Route::get('/add_project',[AdminController::class,'add_project'])->name('addprojects');
Route::post('/createprojects',[AdminController::class,'store_project'])->name('add_projects');
Route::get('/getprojects',[AdminController::class,'getproject'])->name('getproject');
Route::get('/all_project',[AdminController::class,'all_project'])->name('allprojects');
Route::get('/edit_project/{id}',[AdminController::class,'edit_project']);
Route::post('/updateproject/{id}', [AdminController::class, 'updateproject']);
Route::post('/accept_project/{id}', [AdminController::class, 'acceptProject']);
Route::post('/reject_project/{id}', [AdminController::class, 'rejectProject']);





Route::get('/add_batch',[AdminController::class,'add_batch'])->name('addbatches');
Route::post('/createbatches',[AdminController::class,'store_batch'])->name('add_batches');
Route::get('/getbatches',[AdminController::class,'getbatch'])->name('getbatch');
Route::post('/update-batch-status', [AdminController::class, 'updateBatchStatus']);
Route::get('/close-batch/{id}',[AdminController::class,'close'])->name('close-batch')->middleware('auth');
Route::get('/open-batch/{id}',[AdminController::class,'open'])->name('open-batch')->middleware('auth');
Route::get('/check-batch-status', [StudentController::class, 'checkStatus'])->name("check_batch_status");


Route::get('/getbatches',[AdminController::class,'getBatches'])->name('getbatches');
Route::get('/getTeams',[AdminController::class,'getTeams'])->name('getTeams');
Route::get('/getMembers',[AdminController::class,'getMembers'])->name('getMembers');
Route::get('/getStudents',[AdminController::class,'getStudents'])->name('getStudents');
 
Route::get('/getprojectcount',[AdminController::class,'getProjectcount']);
Route::get('/getmembercount',[AdminController::class,'getMemberscount']);
Route::get('getstudentcount',[AdminController::class,'grtstudentscount']);



Route::get('/add_faculty',[AdminController::class,'add_faculty'])->name('addfaculties');
Route::post('/createfaculties',[AdminController::class,'store_faculty'])->name('add_faculties');
Route::get('/getfaculties',[AdminController::class,'getfaculty'])->name('getfaculty');






//member part
Route::get('/member_register',[MemberController::class,'reg_mem'])->name('member_register');
Route::post('/createmember', [MemberController::class, 'store'])->name('member_store');
Route::get('/member_list',[MemberController::class,'mem_list'])->name('member_list');
Route::get('/edit_member/{id}',[MemberController::class,'edit']);
Route::post('/update-member/{bioid}', [MemberController::class, 'update']);
Route::post('/accept_member/{id}', [MemberController::class, 'acceptMember']);
Route::post('/reject_member/{id}', [MemberController::class, 'rejectMember']);
Route::get('/get-user/{member_id}', [MemberController::class, 'getUser'])->name('get.user');

// Route to get user view
Route::get('/get-user-view/{member_id}', [MemberController::class, 'getUserView']);

Route::get('/fetch_student',[MemberController::class,'fetchstudent'])->name('student_assigned');
Route::post('/add_task',[MemberController::Class,'add_task'])->name('add_task');
Route::get('/fetch_project/{student_name}', [MemberController::class, 'fetchProject'])->name('fetch_project');

Route::get('/fetch_project/{id}', [StudentController::class, 'fetchProject']);



//student part
Route::get('/student_register',[StudentController::class,'student_registration'])->name('student_register');
Route::post('/createstudent', [StudentController::class, 'store_student'])->name('student_store');
Route::get('/student_list',[StudentController::class,'stu_list'])->name('student_list');
Route::get('/edit_student/{id}',[StudentController::class,'check']);
Route::post('/update-student/{id}', [StudentController::class, 'modify']);
Route::post('/accept_student/{id}', [StudentController::class, 'acceptStudent']);
Route::post('/reject_student/{id}', [StudentController::class, 'rejectStudent']);
Route::get('/getmember', [StudentController::class, 'getMembers']);
Route::get('/getproject', [StudentController::class, 'getProjects']);

Route::get('/gettask_student',[StudentController::class,'gettask_student'])->name('gettask_student');

Route::get('/fetch_student1', [StudentController::class, 'fetchStudent1'])->name('stu_attend');

Route::post('/mark_attendance', [StudentController::class, 'markAttendance']);



// leave controller part

Route::get('/leave', [LeaveController::class, 'showForm'])->name('leave.request.form');
Route::post('/leave', [LeaveController::class, 'submitRequest'])->name('leave.request.submit');

// admin controller
Route::get('/fetch_leave',[AdminController::class,'fetch_leave']);


