<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FriendshipController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['user' => Auth::user()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/friend-request/{receiverId}', [FriendshipController::class, 'sendRequest'])->name('friend.request');
    Route::get('/friend-requests', [FriendshipController::class, 'receivedRequests'])->name('friend.requests');
    Route::post('/friend-requests/{id}/accept', [FriendshipController::class, 'acceptRequest'])->name('friend.accept');
    Route::post('/friend-requests/{id}/decline', [FriendshipController::class, 'declineRequest'])->name('friend.decline');
    Route::get('/friends', [FriendshipController::class, 'friendsList'])->name('friends.list');
});

require __DIR__.'/auth.php';
