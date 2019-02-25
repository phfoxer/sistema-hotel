<?php
namespace App\Modules\General\Hospedagem\Repositories;
use App\Modules\General\Hospedagem\Models\Hospedagem;

use Illuminate\Http\Request;

class HospedagemSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->nome) {
        $queryBuilder->whereHas("hospede",function($query) use ($request) {
           $query->where('nome', 'like', '%'.$request->nome.'%');
        });
    }

    if ($request->documento) {
        $queryBuilder->whereHas("hospede",function($query) use ($request) {
           $query->where('documento', 'like', '%'.$request->documento.'%');
        });
    }

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->usuario_id) {
        $queryBuilder->where("usuario_id","=",$request->usuario_id);
    }

    if ($request->entrada) {
        $queryBuilder->where("entrada","=",$request->entrada);
    }

    if ($request->saida) {
        $queryBuilder->where("saida","=",$request->saida);
    }

    if ($request->hospedados=='sim') {
        $queryBuilder->where("saida",">",date('Y-m-d H:i:s'));
    }

    if ($request->hospedados=='nao') {
        $queryBuilder->where("saida","<",date('Y-m-d H:i:s'));
    }


    if ($request->garagem) {
        $queryBuilder->where("garagem","=",$request->garagem);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}