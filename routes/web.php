<?php

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\BitacorasController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ManualsController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdministrarCuentaController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\HistorialesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
Route::get('/Inventario/EquiposInactivos/buscar', [InventarioController::class, 'buscarInactivos'])->name('equipos.inactivos.buscar')->middleware('can:inventario');
Route::get('/Inventario/EquiposInactivos', [InventarioController::class, 'indexInactivos'])->name('equipos.inactivos')->middleware('can:inventarioInactivos');
Route::get('/Inventario/AgregarEquipo', [InventarioController::class, 'create'])->name('equipos.agregarequipo')->middleware('can:inventarioAgregarEquipo');;
Route::post('/Inventario', [InventarioController::class, 'store'])->name('equipos.store')->middleware('can:inventarioAgregarEquipo');;
Route::get('/Inventario/{equipo}', [InventarioController::class, 'show'])->name('equipos.show')->middleware('can:inventarioVer');;
Route::get('/Inventario/{equipo}/edit', [InventarioController::class, 'edit'])->name('equipos.edit')->middleware('can:inventarioEditarEquipo');;
Route::patch('/Inventario/{equipo}', [InventarioController::class, 'update'])->name('equipos.update')->middleware('can:inventarioEditarEquipo');;
Route::delete('/Inventario/{equipo}', [InventarioController::class, 'destroy'])->name('equipos.destroy')->middleware('can:inventarioEliminarEquipo');;

Route::get('/Bitacoras/buscar', [BitacorasController::class, 'buscar'])->name('bitacoras.buscar')->middleware('can:bitacoras');
Route::delete('/Bitacoras/EliminarBitacoraFisica/{bitacora}', [BitacorasController::class, 'destroyFile'])->name('bitacoras.destroyFile')->middleware('can:bitacorasEliminarBitacoraFisica');
Route::resource('/Bitacoras', BitacorasController::class)->names('bitacoras')->middleware('can:bitacoras')->parameters(['Bitacoras' => 'bitacora']);

Route::view('/login', 'auth.login')->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/RegistrarUsuario', [RegisteredUserController::class, 'index'])->name('registrar')->middleware('can:RegistrarUsuario');
Route::post('/RegistrarUsuario', [RegisteredUserController::class, 'store'])->middleware('can:RegistrarUsuario');

Route::get('/Usuarios/buscar', [UserController::class, 'buscar'])->name('usuarios.buscar')->middleware('can:usuarios');
Route::resource('/Usuarios', UserController::class)->names('usuarios')->parameters(['Usuarios' => 'usuario'])->except('create', 'store');

Route::get('/Manuales/buscar', [ManualsController::class, 'buscar'])->name('manuals.buscar');
Route::resource('/Manuales', ManualsController::class)->names('manuales')->parameters(['Manuales' => 'manual']);

Route::get('/Imagenes/buscar', [ImagesController::class, 'buscar'])->name('images.buscar');
Route::resource('/Imagenes', ImagesController::class)->names('imagenes')->parameters(['Imagenes' => 'image']);

Route::get('/Roles/buscar', [RoleController::class, 'buscar'])->name('roles.buscar');
Route::resource('/Roles', RoleController::class)->names('roles')->parameters(['Roles' => 'role']);

Route::get('/AdministrarCuenta', [AdministrarCuentaController::class, 'index'])->name('administrarcuenta')->middleware('auth');

Route::post('/Inventario/{equipo}/baja', [InventarioController::class, 'baja'])->name('equipos.baja')->middleware('can:inventarioDarBaja');
Route::post('/Inventario/{equipo}/alta', [InventarioController::class, 'alta'])->name('equipos.alta')->middleware('can:inventarioDarAlta');

Route::get('/Estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index')->middleware('can:estadisticas');

Route::get('/change-password', [AuthenticatedSessionController::class, 'changePassword'])->name('usuario.changepassword')->middleware('auth');
Route::post('/change-password/update', [AuthenticatedSessionController::class, 'updatePassword'])->name('usuario.updatepassword')->middleware('auth');

Route::get('/change-email', [AuthenticatedSessionController::class, 'changeEmail'])->name('usuario.changeemail')->middleware('auth');
Route::post('/change-email/update', [AuthenticatedSessionController::class, 'updateEmail'])->name('usuario.updateemail')->middleware('auth');

Route::get('/Historiales/Inventario', [HistorialesController::class, 'inventarioLog'])->name('historiales.inventarioLogIndex')->middleware('auth');
Route::get('/Historiales/Bitacoras', [HistorialesController::class, 'bitacorasLog'])->name('historiales.bitacorasLogIndex')->middleware('auth');
Route::get('/Historiales/Manuales', [HistorialesController::class, 'manualesLog'])->name('historiales.manualesLogIndex')->middleware('auth');
Route::get('/Historiales/Imagenes', [HistorialesController::class, 'imagenesLog'])->name('historiales.imagenesLogIndex')->middleware('auth');
Route::get('/Historiales/Usuarios', [HistorialesController::class, 'usuariosLog'])->name('historiales.usuariosLogIndex')->middleware('auth');
Route::get('/Historiales/Roles', [HistorialesController::class, 'rolesLog'])->name('historiales.rolesLogIndex')->middleware('auth');
Route::get('/Historiales/SesionesUsuarios', [HistorialesController::class, 'sesionesUsuariosLog'])->name('historiales.sesionesUsuariosLogIndex')->middleware('auth');
// Ruta para mostrar el formulario de recuperacion de contraseña
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request')->middleware('guest');

// Ruta para enviar el correo de restablecimiento de contraseña
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email')->middleware('guest');

// Ruta para mostrar el formulario de restablecimiento de contraseña
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset')->middleware('guest');

// Ruta para procesar el restablecimiento de contraseña
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->name('password.update')->middleware('guest');

Route::get('/BuscarTipoDeEquipo', [InventarioController::class, 'tipoDeEquipoBuscar'])->name('BuscarTipoDeEquipo');