<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Utilisateurs;
use App\Models\utilisateur;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


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
        return redirect('login');
    });// cette permet d'afficher par defaut la page de connexion

///

Route::get('/admin', function () {
    return view('admin');
});



