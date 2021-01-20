<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/testone', [App\Http\Controllers\TestController::class, 'testone'])->name('testone');
Route::get('/testtwo', [App\Http\Controllers\TestController::class, 'testtwo'])->name('testtwo');
Route::get('/testthree', [App\Http\Controllers\TestController::class, 'testthree'])->name('testthree');


Route::resource('role', App\Http\Controllers\RoleController::class);
Route::resource('asignrole', App\Http\Controllers\AsignroleController::class);
Route::resource('page', App\Http\Controllers\PageController::class);
Route::get('/pages/{pgname}', [App\Http\Controllers\PageController::class, 'loadpages'])->name('loadpages');
Route::resource('catagory', App\Http\Controllers\CatagoryController::class);
//Route::resource('student', App\Http\Controllers\StudentController::class);
//Route::get('student','App\Http\Controllers\StudentController@index');
//Route::post ( '/addItem', 'IndexController@addItem' );
Route::post('student','App\Http\Controllers\StudentController@store')->name('student.store');
Route::get('student/{id}/edit', 'App\Http\Controllers\StudentController@edit')->name('student.edit');
Route::post('student/update', 'App\Http\Controllers\StudentController@update')->name('student.update');
Route::get('student/{id}/delete', 'App\Http\Controllers\StudentController@destroy')->name('student.delete');
Route::get('student/{id}', 'App\Http\Controllers\StudentController@getstudentbyid');
Route::get('/students', 'App\Http\Controllers\StudentController@get_student_data')->name('student.getall');
 



Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'admin']);
Route::get('/superadmin', [App\Http\Controllers\DashboardController::class, 'superadmin']);