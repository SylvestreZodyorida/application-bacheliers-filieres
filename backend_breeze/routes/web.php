<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

// Routes protégées par des middlewares spécifiques aux rôles
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->is_admin == 2) {
            return redirect()->route('student.accueil');
        }
        return redirect('/');
    })->name('user.dashboard');
});

//admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

//student middleware
Route::middleware(['auth', 'auth:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.acceuil');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
