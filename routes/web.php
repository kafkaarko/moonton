<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
use Inertia\Inertia;
use Ramsey\Uuid\Type\Integer;



Route::redirect('/','/prototype/login');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('prototype')->name('prototype.')->group(function(){
    Route::get('/login',function(){
        return Inertia::render('Prototype/Login');
    })->name('login');

    Route::get('/register',function(){
        return Inertia::render('Prototype/Register');
    })->name('register');

    Route::get('/dashboard',function(){
        return Inertia::render('Prototype/Dashboard');
    })->name('dashboard');
    Route::get('/subscriptionPlan',function(){
        return Inertia::render('Prototype/SubscriptionPlan');
    })->name('subscriptionPlan');
    
});

require __DIR__.'/auth.php';
