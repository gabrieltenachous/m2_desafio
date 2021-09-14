<?php

use App\Http\Controllers\api\CampanhaController;
use App\Http\Controllers\api\CidadeController;
use App\Http\Controllers\api\DescontoController;
use App\Http\Controllers\api\GrupoCidadeController;
use App\Http\Controllers\api\ProdutoController;
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

Route::apiResource('/campanhas', CampanhaController::class);
Route::apiResource('/cidades', CidadeController::class);
Route::apiResource('/descontos', DescontoController::class);
Route::apiResource('/produtos', ProdutoController::class);
Route::apiResource('/grupo_cidades', GrupoCidadeController::class);

