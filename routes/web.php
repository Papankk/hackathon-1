<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\UserVoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserVoteController::class, 'index'])->name('vote');
Route::get('/vote/{id}', [UserVoteController::class, 'vote'])->name('vote.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/voting', [VotingController::class, 'index'])->name('voting.index');
    Route::post('/voting/store', [VotingController::class, 'store'])->name('voting.insert');
    Route::post('/voting/update/{id}', [VotingController::class, 'update'])->name('voting.update');
    Route::delete('/voting/delete/{id}', [VotingController::class, 'delete'])->name('voting.delete');

    Route::get('/option', [OptionController::class, 'index'])->name('option.index');
    Route::post('/option/store', [OptionController::class, 'store'])->name('option.insert');
    Route::post('/option/update/{id}', [OptionController::class, 'update'])->name('option.update');
    Route::delete('/option/delete/{id}', [OptionController::class, 'delete'])->name('option.delete');

    Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
    Route::post('/vote/store', [VoteController::class, 'store'])->name('vote.insert');
    Route::post('/vote/update/{id}', [VoteController::class, 'update'])->name('vote.update');
    Route::delete('/vote/delete/{id}', [VoteController::class, 'delete'])->name('vote.delete');
});


require __DIR__ . '/auth.php';
