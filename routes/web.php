<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\PageController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/projects', [PageController::class, 'projects'])->name('projects');

Route::get('/projects/{project:slug}', [PageController::class, 'show'])->name('projects.show');
//Route::resource('projects', ProjectController::class);

Route::middleware('auth') //, 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        // admin dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug',]);
    });


Route::get('/dashboard', function () {
    $projects = Project::all();
    return view('admin.dashboard', compact('projects'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
