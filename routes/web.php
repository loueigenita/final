<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAccountsController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('LandingPage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'updateProfilePic'])->name('profilepic.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:user')->group( function() {

        Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
        Route::patch('/account', [AccountController::class, 'update'])->name('account.update');
       
        
        
    });

    Route::middleware('role:admin')->group( function() {
        Route::get('/accounts/view/{id}', [AccountController::class, 'view'])->name('accounts.view');
        Route::get('/accounts', [UserAccountsController::class, 'index'])->name('accounts');
        Route::get('/accounts/view/{account}', [UserAccountsController::class, 'view'])->name('accounts.view');
        Route::patch('/accounts/{account}', [UserAccountsController::class, 'update'])->name('accounts.update');
        Route::post('/accounts/toggle/{account}', [UserAccountsController::class, 'toggleActive'])->name('accounts.toggle');
        Route::get('/accounts/search/{searchKey}', [UserAccountsController::class, 'search'])->name('accounts.search');
        
        Route::get('/students/pdf/{student}', [StudentController::class, 'generate']);
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('/students', [StudentController::class, 'store'])->name('students.store');
        Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


        Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements');
        Route::post('/announcements/send-mail', [AnnouncementController::class, 'send']);
    });
});

require __DIR__.'/auth.php';
