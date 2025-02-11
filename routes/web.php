<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/fetch', [EmployeeController::class, 'fetchEmployees'])->name('employees.fetch');
    Route::get('/employees/add', [EmployeeController::class, 'create'])->name('employees.add');
    Route::post('/employees/add', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/edit/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/edit/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/delete/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

require __DIR__.'/auth.php';
