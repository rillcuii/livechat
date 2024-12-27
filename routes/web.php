<?php

use App\Models\User;
use App\Livewire\Chat;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::get('dashboard', function (){
    return view('dashboard', [
        'users' => User::where('id', '!=', auth()->id())->get(),
    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/chat/{user}', Chat::class)->name('chat');  

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
