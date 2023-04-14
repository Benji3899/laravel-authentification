<?php

use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', [UserController::class, 'index']);

//Route::get('login', function () {
//    return 'login';
//})->name('login');

//Route::get('users', function (){
//    $users = User::all();
//    return view('users', ['users' => $users]);
//});

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
    return Socialite::driver('azure')->redirect();
})->name('azure.redirect');


// Authentification et stockage microsoft
// https://laravel.com/docs/10.x/socialite#authentication-and-storage
Route::get('/auth/callback', function () {
    $azureUser = Socialite::driver('azure')->user();

    $user = User::updateOrCreate([
        'email' => $azureUser->email,
    ], [
        'name' => $azureUser->name,
        'email' => $azureUser->email,
        'azure_token' => $azureUser->token,
        'azure_refresh_token' => $azureUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});

Route::get('/my-podcasts', [PodcastController::class, 'Userpodcasts'])->name('podcasts.my-podcasts')->middleware('auth');

// ajouté ->middleware('auth') avant le ; pour forcer la connexion si l'utilisateur n'est pas connecter
Route::resource('podcasts', PodcastController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');

require __DIR__.'/auth.php';
