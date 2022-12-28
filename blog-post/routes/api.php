<?php
use App\Models\Knjiga;
use App\Models\Autor;
use App\Models\Zanr;
use App\Models\User;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ZanrController;
use App\Http\Controllers\KnjigaAutorController;
use App\Http\Controllers\KnjigaZanrController;
use App\Http\Controllers\UserKnjigaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index'])->name('users.show');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.index');
//Route::resource('knjigas', KnjigaController::class);
//Route::resource('user.knjigas', UserKnjigaController::class);
Route::get('users/{id}/knjigas', [UserKnjigaController::class,'index'])->name('users.knjigas.index');
Route::resource('knjiga', KnjigaController::class)->only(['index','show']);
Route::resource('autor', AutorController::class);
Route::resource('zanr', ZanrController::class);
Route::resource('autor.knjiga', KnjigaAutorController::class);
Route::resource('zanr.knjiga', KnjigaZanrController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/profile', function(Request $request){
        return auth()->user();
    });
    Route::resource('knjiga', KnjigaController::class)->only(['update','store','destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});