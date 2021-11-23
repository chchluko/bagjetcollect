<?php

use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\EmployeeDataController;

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

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

Route::resource('expediente', DocumentTypeController::class)->names('archivo');
Route::resource('empleado', EmployeeController::class)->names('empleado');
Route::resource('empleadodatos', EmployeeDataController::class)->names('datosempleado');
