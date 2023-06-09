<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('post.index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/dashboard', [PostController::class, 'myPosts'])->middleware('auth')->name('posts.myPosts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// La route-ressource => Les routes "post.*"
Route::get("/", [PostController::class, "index"]);
Route::get("/dashboard", [PostController::class, "show"])->middleware(['auth', 'verified'])->name('dashboard');