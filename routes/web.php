<?php

use App\Http\Controllers\UsersController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return 'login';
})->name('login');

Route::get('users', function (){
    $users = User::all();
    return view('users', ['users' => $users]);
});
//
//Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
//
//Route::post('users', [UsersController::class, 'store'])->name('users.store');
//
//Route::get('users', [UsersController::class, 'index'])->name('users.index');
//
//Route::get('users/{user}', [UsersController::class, 'show'])->name('users.show');
//
//
//
//Route::delete('/users/{user}',  [UsersController::class, 'destroy'])->name('users.destroy');
//
//Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
//
//Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');

Route::resource('users', UsersController::class);
