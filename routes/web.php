<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FocusController;
use App\Http\Controllers\FocusSessionController;
use App\Http\Controllers\FocusHistoryController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

    Route::resource('tasks', TaskController::class);

    Route::get('/focus', [FocusController::class, 'index']) ->name('focus.index');

    Route::post('/focus/sessions', [FocusSessionController::class, 'store'])
    ->name('focus.sessions.store');

    Route::get('/focus/history', [FocusHistoryController::class, 'index'])->name('focus.history');

    Route::get('/progress', [ProgressController::class, 'index'])
    ->name('progress.index');

    Route::get('/achievements', [AchievementController::class, 'index'])
    ->name('achievements.index');
});

require __DIR__.'/auth.php';