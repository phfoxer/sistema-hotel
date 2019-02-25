<?php

use Illuminate\Http\Request;

/**
* Module Usuario
*/
Route::apiResource("usuario","\App\Modules\General\Usuario\Controllers\UsuarioController");
/**
* Module Hospedagem
*/
Route::apiResource("hospedagem","\App\Modules\General\Hospedagem\Controllers\HospedagemController");
/**
* Module Preco
*/
Route::apiResource("preco","\App\Modules\General\Preco\Controllers\PrecoController");