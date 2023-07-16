<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [LandingController::class, 'index']);
Route::get('job-list', [JobListController::class, 'index'])->name('job-list');
Route::get('job-list/{id}', [JobListController::class, 'show'])->name('job-list.show');
Route::get('job-apply/{id}', [JobApplyController::class, 'index'])->name('job-apply');
Route::post('job-apply/{id}', [JobApplyController::class, 'store'])->name('job-apply.store');
Route::get('job-apply-success', [JobApplyController::class, 'success'])->name('job-apply.success');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('store-kelengkapan', [DashboardController::class, 'store'])->name('kelengkapan.store');
