<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Welcome'))->name('home');

Route::get('dashboard', fn () => Inertia::render('Dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/chat', [App\Http\Controllers\Chat\ChatController::class, 'index'])->middleware(['auth', 'verified'])->name('chat');
Route::post('/chat/send', [App\Http\Controllers\Chat\ChatController::class, 'sendMessage']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
