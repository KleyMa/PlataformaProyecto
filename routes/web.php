<?php

use App\Http\Controllers\InventarioController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\BitacorasController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ManualsController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
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


//misitio.com => welcome
//misitio.com/AgregarEquipo => agregarequipo
Route::view('/', 'welcome')->name('welcome')->middleware('auth');;
Route::get('/Inventario', [InventarioController::class, 'index'])->name('inventario')->middleware('can:inventario');
Route::get('/Inventario/buscar', [InventarioController::class, 'buscar'])->name('inventario.buscar')->middleware('can:inventario');;
Route::get('/Inventario/AgregarEquipo', [InventarioController::class, 'create'])->name('equipos.agregarequipo')->middleware('can:inventarioAgregarEquipo');;
Route::post('/Inventario', [InventarioController::class, 'store'])->name('equipos.store')->middleware('can:inventarioAgregarEquipo');;
Route::get('/Inventario/{equipo}', [InventarioController::class, 'show'])->name('equipos.show')->middleware('can:inventarioVer');;
Route::get('/Inventario/{equipo}/edit', [InventarioController::class, 'edit'])->name('equipos.edit')->middleware('can:inventarioEditarEquipo');;
Route::patch('/Inventario/{equipo}', [InventarioController::class, 'update'])->name('equipos.update')->middleware('can:inventarioEditarEquipo');;
Route::delete('/Inventario/{equipo}', [InventarioController::class, 'destroy'])->name('equipos.destroy')->middleware('can:inventarioEliminarEquipo');;

Route::get('/Bitacoras/buscar', [BitacorasController::class, 'buscar'])->name('bitacoras.buscar')->middleware('can:bitacoras');;
Route::resource('/Bitacoras', BitacorasController::class)->names('bitacoras')->middleware('can:bitacoras')->parameters(['Bitacoras' => 'bitacora']);

Route::view('/login', 'auth.login')->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/RegistrarUsuario', [RegisteredUserController::class, 'index'])->name('registrar')->middleware('can:RegistrarUsuario');
Route::post('/RegistrarUsuario', [RegisteredUserController::class, 'store'])->middleware('can:RegistrarUsuario');

Route::get('/Usuarios/buscar', [UserController::class, 'buscar'])->name('usuarios.buscar')->middleware('can:usuarios');
Route::resource('/Usuarios', UserController::class)->names('usuarios')->middleware('can:usuarios')->parameters(['Usuarios' => 'usuario'])->except('create', 'store');

Route::get('/Manuales/buscar', [ManualsController::class, 'buscar'])->name('manuals.buscar')->middleware('auth');
Route::resource('/Manuales', ManualsController::class)->names('manuales')->middleware('auth')->parameters(['Manuales' => 'manual']);

Route::get('/Imagenes/buscar', [ImagesController::class, 'buscar'])->name('images.buscar')->middleware('auth');
Route::resource('/Imagenes', ImagesController::class)->names('imagenes')->middleware('auth')->parameters(['Imagenes' => 'image']);

Route::get('/Roles/buscar', [RoleController::class, 'buscar'])->name('roles.buscar')->middleware('auth');
Route::resource('/Roles', RoleController::class)->names('roles')->middleware('auth')->parameters(['Roles' => 'role']);

// Ruta para mostrar el formulario de olvido de contraseña
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Ruta para enviar el correo de restablecimiento de contraseña
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Ruta para mostrar el formulario de restablecimiento de contraseña
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Ruta para procesar el restablecimiento de contraseña
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');