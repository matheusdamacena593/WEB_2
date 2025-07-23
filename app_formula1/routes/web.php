<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', [NoticiaController::class, 'home'])->name('home');
Route::resource('noticias', NoticiaController::class);


Route::get('/dashboard', [NoticiaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/noticias/{noticia}', [NoticiaController::class, 'show'])->name('noticias.show');
Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/search', [NoticiaController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
