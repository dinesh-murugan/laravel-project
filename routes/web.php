<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    // $user=DB::select("select * from users");
    // dd($user);  
});

Route::get ('/employees',[EmployeeController::class,'index'])-> name('employee.index');
Route::get('/employees/create',[EmployeeController::class,'create'])-> name ('employee.create');
Route::post('/employees/store',[EmployeeController::class,'store'])-> name ('employees.store');
Route::get('/employees/{id}',[EmployeeController::class,'show'])-> name ('employees.show');
Route::get('/employees/{id}}/edit',[EmployeeController::class,'edit'])-> name ('employees.edit');
Route::put('/employees/{employee}}/edit',[EmployeeController::class,'update'])-> name ('employees.update');
Route::delete('/employees/{employee}}/edit',[EmployeeController::class,'destroy'])-> name ('employees.destroy');


//product list

Route::get('/product/index',[Productcontroller::class,'index'])-> name ('product.index');
Route::get('/product/create',[Productcontroller::class,'create'])-> name ('product.create');
Route::get('/product/{id}/edit',[Productcontroller::class,'edit'])-> name ('product.edit');
Route::post('/product/store',[Productcontroller::class,'store'])-> name ('product.store');
Route::get('/product/{id}/show',[Productcontroller::class,'show'])-> name ('product.show');
Route::put('/product/{id}/update',[Productcontroller::class,'update'])-> name ('product.update');
Route::delete('/product/{id}', [App\Http\Controllers\Productcontroller::class, 'destroy'])->name('product.destroy');



require __DIR__.'/auth.php';
?>