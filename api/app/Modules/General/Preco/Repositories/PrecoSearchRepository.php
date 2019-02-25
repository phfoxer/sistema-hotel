<?php
namespace App\Modules\General\Preco\Repositories;
use App\Modules\General\Preco\Models\Preco;

use Illuminate\Http\Request;

class PrecoSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->dia) {
        $queryBuilder->where("dia","=",$request->dia);
    }

    if ($request->valor_diaria) {
        $queryBuilder->where("valor_diaria","=",$request->valor_diaria);
    }

    if ($request->valor_garagem) {
        $queryBuilder->where("valor_garagem","=",$request->valor_garagem);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}