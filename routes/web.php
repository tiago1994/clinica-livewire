<?php

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

Route::get('/login' , \App\Http\Livewire\Login::class)->name('login');
Route::get('/logout' , '\App\Http\Livewire\Login@logout')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/' , \App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/dashboard' , \App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/agendamentos' , \App\Http\Livewire\Agendamentos::class)->name('agendamentos');
    Route::get('/pacientes' , \App\Http\Livewire\Pacientes::class)->name('pacientes');
    Route::get('/financeiro' , \App\Http\Livewire\Financeiro::class)->name('financeiro');
    Route::get('/perfil' , \App\Http\Livewire\Perfil::class)->name('perfil');
 });