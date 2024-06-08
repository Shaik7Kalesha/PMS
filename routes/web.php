<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LoginController::class,'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/homepage',[LoginController::class,'index']);
require __DIR__.'/auth.php';

Route::get('/member_register',[MemberController::class,'reg_mem'])->name('member_register');
Route::post('/createmember', [MemberController::class, 'store'])->name('member_store');
Route::get('/member_list',[MemberController::class,'mem_list'])->name('member_list');




Route::get('/student_register',[StudentController::class,'student_registration'])->name('student_register');
Route::post('/createstudent', [StudentController::class, 'store_student'])->name('student_store');
Route::get('/student_list',[StudentController::class,'stu_list'])->name('student_list');

