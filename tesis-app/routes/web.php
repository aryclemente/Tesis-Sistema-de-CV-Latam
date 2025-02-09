<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuhtController;


Route::get('/', function () {
    return view('visitante.HomePage');
})->name('home');

Route::get('/blog', function () {
    return view('visitante.Blog'); // Muestra la vista Blog
})->name('blog');

Route::get('/contacto', function () {
    return view('visitante.Contactanos'); // Muestra la vista Contacto
})->name('contacto');

Route::get('/nosotros', function () {
    return view('visitante.SobreNosostros'); // Muestra la vista Nosotros
})->name('nosotros');


Route::prefix('auth')->group(function () {

    Route::get('login', [AuhtController::class, 'login'])->name('login');
    Route::post('login', [AuhtController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuhtController::class, 'register'])->name('register');
    Route::get('register',[AuhtController::class, 'showForm'])->name('register');
    Route::post('register', [AuhtController::class, 'registerStore'])->name('register.store');
});
