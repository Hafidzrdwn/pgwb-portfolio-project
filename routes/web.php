<?php

use App\Http\Controllers\JenisKontakController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\SiswaController;
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

Route::view('/', 'client.home')->name('home');

Route::prefix('abouts')->group(function () {
    Route::view('/about', 'client.about')->name('about');
    Route::view('/services', 'client.services')->name('services');
    Route::view('/skills', 'client.skills')->name('skills');
});
Route::view('/projects', 'client.projects')->name('projects');
Route::view('/contact', 'client.contact')->name('contact');



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin');
    Route::get('/change_pass', 'UserController@changepass')->name('change_pass');
    Route::post('/change_pass', 'UserController@change_password')->name('change_password');

    Route::prefix('master')->group(function () {
        Route::resource('siswa', SiswaController::class);
        Route::get('siswa/{siswa}/projeks', 'SiswaController@projeks')->name('siswa.projeks');
        Route::resource('projek', ProjekController::class);
        Route::get('projek/{projek}/detail', 'ProjekController@show_detail')->name('projek.detail');
        Route::resource('kontak', KontakController::class);
        Route::resource('jenis_kontak', JenisKontakController::class);
    });
});

Route::post('/logout', 'AuthController@logout')->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/register', 'AuthController@register')->name('register');
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/registration', 'AuthController@registration')->name('registration');
    Route::post('/authenticate', 'AuthController@authenticate')->name('authenticate');
});
