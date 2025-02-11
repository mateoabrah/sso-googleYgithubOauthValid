<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta per redirigir l'usuari a Google
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

// Ruta de callback quan l'usuari torna després d'iniciar sessió a Google
Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->user(); // * DE MOMENTO NO ESTA DISPONIBLE STATELESS

    $user = User::updateOrCreate([
        'email' => $user_google->email,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
    ]);

    Auth::login($user, true);

    return redirect('/dashboard');
});


Route::get('/github-auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/github-auth/callback', function () {
    $user_github = Socialite::driver('github')->user();

    // Busca o crea un usuario en la base de datos
    $user = User::updateOrCreate([
        'email' => $user_github->getEmail(),
    ], [
        'name' => $user_github->getName(),
        // Si usas Google y GitHub, debes asegurarte de que el campo 'password' sea nulo
        'password' => null,
    ]);

    Auth::login($user, true);

    return redirect('/dashboard');
});



require __DIR__.'/auth.php';
