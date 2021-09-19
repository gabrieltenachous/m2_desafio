<?php

use App\Http\Controllers\api\CampanhaController;
use App\Http\Controllers\api\CidadeController;
use App\Http\Controllers\api\DescontoController;
use App\Http\Controllers\api\GrupoCidadeController;
use App\Http\Controllers\api\ProdutoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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
 
Route::post('/register',[RegisteredUserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/campanhas', CampanhaController::class);
    Route::apiResource('/cidades', CidadeController::class);
    Route::apiResource('/descontos', DescontoController::class);
    Route::apiResource('/produtos', ProdutoController::class);
    Route::apiResource('/grupo_cidades', GrupoCidadeController::class);
}); 
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
