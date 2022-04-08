<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/zacheta', function () {
    return view('zacheta');
})->name('zacheta');

Route::get('/sprzety', [AdminController::class,'sprzety'])
->middleware(['auth'])->name('sprzety');

Route::get('/strazacy', [AdminController::class,'strazacy'])
->middleware(['auth'])->name('strazacy');

Route::get('/akcje', [AdminController::class,'akcje'])
->middleware(['auth'])->name('akcje');

Route::get('/admin', [AdminController::class,'get'])
->middleware(['auth'])->name('admin');

Route::get('/dodajstrazak', [AdminController::class,'dodajstrazak'])
->middleware(['auth']);

Route::get('/edytujstrazaka/{id}', [AdminController::class,'edytujstrazaka'])
->middleware(['auth']);

Route::put('/edytujstrazaka/{id}', [AdminController::class,'edytujstrazakaput'])
->middleware(['auth']);

Route::get('/edytujsprzet', [AdminController::class,'dodajsprzet'])
->middleware(['auth']);

Route::get('/dodajsprzet', [AdminController::class,'nowysprzet'])
->middleware(['auth']);

Route::post('/dodajsprzet', [AdminController::class,'nowysprzetpost'])
->middleware(['auth']);

Route::get('/edytujsprzet/{id}', [AdminController::class,'edytujsprzetid'])
->middleware(['auth']);

Route::post('/edytujsprzet/{id}', [AdminController::class,'edytujsprzetpost'])
->middleware(['auth']);

Route::get('/akcja', [AdminController::class,'akcja'])
->middleware(['auth']);

Route::post('/dodajakcje', [AdminController::class,'dodajakcje'])
->middleware(['auth']);

Route::get('/zobaczakcje/{id}', [AdminController::class,'zobaczakcje'])
->middleware(['auth']);







