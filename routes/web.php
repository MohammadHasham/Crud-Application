<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
Route::get('/employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::put('/employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
Route::delete('/employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy');
Route::get('/employees/{employee}',[EmployeeController::class,'show'])->name('employees.show');
Route::get('/trash',[EmployeeController::class,'trash'])->name('employees.trash');
Route::get('/employees/restore/{id}',[EmployeeController::class,'restore'])->name('employees.restore');
Route::get('/employees/force-delete/{id}',[EmployeeController::class,'forceDelete'])->name('employees.forcedelete');
