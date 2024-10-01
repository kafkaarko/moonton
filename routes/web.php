<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
use Inertia\Inertia;
use Ramsey\Uuid\Type\Integer;
use App\Http\Controllers\User\DashboardController;


Route::redirect('/','/login');

Route::middleware(['auth', RoleMiddleware::class . ':user'])->prefix('dashboard')->name('user.dashboard')->group(function() { 
    Route::get('/', [DashboardController::class , 'index'])->name('index');
});


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
    Route::get('/movie/{slug}',function(){
        return Inertia::render('Prototype/Movie/Show');
    })->name('movie.show');
    
});

require __DIR__.'/auth.php';
