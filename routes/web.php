<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/hello/{name}', function ($name) {
    return 'Hello, ' . $name;
})->name('name.show');

//User Routes
Route::get('/users', [UserController::class, 'AllUsers'])->name('users.show');
Route::get('users/add', [UserController::class, 'AddUsers'])->name('users.add');
Route::post('users/add', [UserController::class, 'addUserIntoDB'])->name('users-add');
Route::get('/users/{id}', [UserController::class, 'getUserById'])->name('users.id');
Route::get('/users/delete/{id}', [UserController::class, 'deleteUserFromDB'])->name('users.delete');
Route::get('/insert-user', [UserController::class, 'insertUserIntoDB'])->name('insert.user');



//Task Routes

Route::get('/tasks', [TaskController::class, 'taskList'])->name('tasks')->middleware('auth');
Route::get('/tasks/{id}', [TaskController::class, 'getTaskById'])->name('tasks.id');
Route::get('/tasks/delete/{id}', [TaskController::class, 'deleteTaskFromDB'])->name('tasks.delete');
Route::get('/tasks-add', [TaskController::class, 'addTaskForm'])->name('task.add');
Route::post('/tasks-add', [TaskController::class, 'addTaskIntoDB'])->name('task-add');


//Gift Routes

Route::get('/gifts', [GiftController::class, 'getAllGifts'])->name('gifts');
Route::get('/gifts/{id}', [GiftController::class, 'getGiftById'])->name('gifts.id');
Route::get('/gifts/delete/{id}', [GiftController::class, 'deleteGiftFromDB'])->name('gifts.delete');
Route::get('/gifts-add', [GiftController::class, 'addGiftForm'])->name('gift.add');
Route::post('/gifts-add', [GiftController::class, 'addGiftIntoDB'])->name('gift-add');
Route::get('/gifts/{id}/update', [GiftController::class, 'updateGiftForm'])->name('gift.update');
Route::post('/gifts/{id}/update', [GiftController::class, 'updateGift'])->name('gifts.update');


Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard')->middleware('auth');




Route::fallback([FallbackController::class, 'fallback']);