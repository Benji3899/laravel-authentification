<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/', [UsersController::class, 'index']);

Route::get('login', function () {
    return 'login';
})->name('login');

Route::get('users', function (){
    $users = User::all();
    return view('users', ['users' => $users]);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTING
// https://laravel.com/docs/10.x/socialite#routing
Route::get('/auth/redirect', function () {
    return Socialite::driver('microsoft')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('microsoft')->user();

    // $user->token
});

// Authentification et stockage microsoft
Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('microsoft')->user();

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});

// admin
Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/private', function (){
        return 'Bonjour admin';
    });
});



// ajouté ->middleware('auth') avant le ; pour forcer la connexion si l'utilisateur n'est pas connecter
Route::resource('users', UsersController::class);

require __DIR__.'/auth.php';
