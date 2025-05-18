<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminValidate;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'dashboard'])->middleware(['auth', 'verified']);


//check
Route::get('/admin', function () {
     return view('Admin.adminhome');
});

// //check
// Route::get('/save', function () {
//       return view('customerdetails.save');;
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/check',function(){
    return view('admin.adminhome');
});

Route::get('RegisterForm',[CustomerController::class,'index'])->name('admin.adminhome');




Route::get('admindashboard',[HomeController::class,'index']);

//admin dashboard
Route::get('/admin-dashboard',[HomeController::class,'admindashboard'])->middleware(['auth', 'verified',AdminValidate::class])->name('admin-dashboard');

//admin register
Route::get('/register-user',[CustomerController::class,'index'])->middleware(['auth', 'verified',AdminValidate::class])->name('register-user');

//admin view
Route::get('/view-user',[CustomerController::class,'viewCustomer'])->middleware(['auth', 'verified',AdminValidate::class])->name('view-user');

//edit user by view
Route::get('/edit-user/{id}',[CustomerController::class,'editcustomer'])->middleware(['auth', 'verified',AdminValidate::class])->name('edit-user');


//save customer by admin
Route::post('savecustomer', [CustomerController::class, 'savecustomer'])->middleware(['auth', 'verified',AdminValidate::class])->name('customerdetails.save');

//edit customer by admin
// Route::get('savecustomer/{customer}/edit', [CustomerController::class, 'editcustomer'])->name('customerdetails.edit');

//Update customer data by ADMIN
Route::put('savecustomer/{customer}/update', [CustomerController::class, 'updatecustomer'])->name('customerdetails.update');

//view data by user
Route::get('viewdata',[CustomerController::class,'viewDataByUser'])->name('user.viewdata');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
