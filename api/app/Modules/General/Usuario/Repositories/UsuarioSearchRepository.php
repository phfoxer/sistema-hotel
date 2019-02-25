<?php
namespace App\Modules\General\Usuario\Repositories;
use App\Modules\General\Usuario\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->nome) {
        $queryBuilder->where('nome', 'like', '%'.$request->nome.'%');
    }

    if ($request->documento) {
        $queryBuilder->where('documento', 'like', '%'.$request->documento.'%');
    }

    if ($request->telefone) {
        $queryBuilder->where("telefone","=",$request->telefone);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}