<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/apply/{id}', [DashboardController::class, 'ApplyJob'])->name('apply.job');
    Route::get('/applications', [DashboardController::class, 'showApplications'])->name('show.application');
    Route::get('/applications-recived', [DashboardController::class, 'showApplicationsAdmin'])->name('show.application.admin');
    Route::post('/upload-documents/{id}', [DashboardController::class, 'uploadDocuments'])->name('jobs.upload');
    Route::delete('/application/{id}', [DashboardController::class, 'deleteApplication'])->name('application.delete');

    Route::get('/job/{jobId}/applications', [DashboardController::class, 'viewJobApplications'])->name('job.applications');
    Route::resource('/file', FileController::class);
    Route::resource('/job', JobController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
