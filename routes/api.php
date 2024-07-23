<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
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


Route::get('/add_role',[AdminController::class,'add_role'])->name('addroles');
Route::post('/createroles',[AdminController::class,'store_role'])->name('add_roles');
Route::get('/getroles',[AdminController::class,'getrole'])->name('getrole');


Route::get('/add_team',[AdminController::class,'add_team'])->name('addteams');
Route::post('/createteams',[AdminController::class,'store_team'])->name('add_teams');
Route::get('/getteams',[AdminController::class,'getteam'])->name('getteam');




Route::get('/add_batch',[AdminController::class,'add_batch'])->name('addbatches');
Route::post('/createbatches',[AdminController::class,'store_batch'])->name('add_batches');
Route::get('/getbatches',[AdminController::class,'getbatch'])->name('getbatch');
Route::get('/update-batch-status',[AdminController::class,'status_batch'])->name('update-batch-status');
Route::get('/close-batch/{id}',[AdminController::class,'close'])->name('close-batch')->middleware('auth');
Route::get('/open-batch/{id}',[AdminController::class,'open'])->name('open-batch')->middleware('auth');
Route::get('/check-batch-status', [StudentController::class, 'checkStatus'])->name("check_batch_status");




Route::get('/add_project',[AdminController::class,'add_project'])->name('addprojects');
Route::post('/createprojects',[AdminController::class,'store_project'])->name('add_projects');
Route::get('/getprojects',[AdminController::class,'getproject'])->name('getproject');
Route::get('/all_project',[AdminController::class,'all_project'])->name('allprojects');
Route::get('/edit_project/{id}',[AdminController::class,'edit_project']);
Route::post('/update_project/{id}', [AdminController::class, 'update_project']);
Route::post('/accept_project/{id}', [AdminController::class, 'acceptProject']);
Route::post('/reject_project/{id}', [AdminController::class, 'rejectProject']);









Route::get('/getbatches',[AdminController::class,'getBatches'])->name('getbatches');
Route::get('/getTeams',[AdminController::class,'getTeams'])->name('getTeams');
Route::get('/getMembers',[AdminController::class,'getMembers'])->name('getMembers');
Route::get('/getStudents',[AdminController::class,'getStudents'])->name('getStudents');










Route::post('/createmember', [MemberController::class, 'store']);
Route::get('/member_list',[MemberController::class,'mem_list'])->name('member_list');
Route::get('/edit_member/{id}',[MemberController::class,'edit']);
Route::post('/update-member/{id}', [MemberController::class, 'update']);
Route::post('/accept_member/{id}', [MemberController::class, 'acceptMember']);
Route::post('/reject_member/{id}', [MemberController::class, 'rejectMember']);

Route::get('/get-user', [MemberController::class, 'getUser']);

// Route to get user view
Route::get('/get-user-view', [MemberController::class, 'getUserView']);


Route::get('/fetch_student',[MemberController::class,'fetchstudent']);
Route::post('/add_task',[MemberController::Class,'add_task']);
Route::get('/fetch_project/{student_name}', [MemberController::class, 'fetchProject'])->name('fetch_project');






Route::post('/createstudent', [StudentController::class, 'store_student']);
Route::get('/student_list',[StudentController::class,'stu_list'])->name('student_list');
Route::get('/edit_student/{id}',[StudentController::class,'check']);
Route::post('/update-student/{id}', [StudentController::class, 'modify']);
Route::post('/student_accept', [StudentController::class, 'take'])->name('project_accept');
Route::post('/student-project', [StudentController::class, 'remove']);
Route::post('/accept_student/{id}', [StudentController::class, 'acceptStudent']);
Route::post('/reject_student/{id}', [StudentController::class, 'rejectStudent']);
Route::get('/getmember',[StudentController::class,'getMembers']);
Route::get('/getproject',[StudentController::class,'getproject']);




Route::get('/add_faculty',[AdminController::class,'add_faculty'])->name('addfaculties');
Route::post('/createfaculties',[AdminController::class,'store_faculty'])->name('add_faculties');
Route::get('/getfaculties',[AdminController::class,'getfaculty'])->name('getfaculty');

