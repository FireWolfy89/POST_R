<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//Breeze Routeok
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Welcome page    
  Route::get('/', function () {
    return view('welcome');
}); 

//Routing az admin és a user dashboardokra + Middleware

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    
});

Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
});

  


//Active status
Route::middleware(['checkUserStatus'])->group(function () {
    
    //Routing a post kreálásra/Részletek/kommentelés

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');

});


//Admin funkciók a userek listázására

Route::middleware(['admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.listuser');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/export-users', [UserController::class, 'export'])->name('export.users');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


