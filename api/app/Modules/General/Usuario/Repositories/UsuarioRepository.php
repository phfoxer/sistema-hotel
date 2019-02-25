<?php
namespace App\Modules\General\Usuario\Repositories;
use App\Modules\General\Usuario\Models\Usuario;
use App\Modules\General\Usuario\Repositories\UsuarioSearchRepository;
use Validator;
use Illuminate\Http\Request;

class UsuarioRepository
{
    private $usuarioSearchRepository;
    function __construct(UsuarioSearchRepository $usuarioSearchRepository){
        $this->usuarioSearchRepository = $usuarioSearchRepository;
    }

    public function index(Request $request){
        return $this->usuarioSearchRepository->search(Usuario::with([]), $request);
    }

    public function show($id){
    	return Usuario::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "nome"=>"nullable",
            "documento"=>"nullable",
            "telefone"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "nome"=>$request->nome,
            "documento"=>$request->documento,
            "telefone"=>$request->telefone,
            ];
            return Usuario::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "nome"=>"nullable",
            "documento"=>"nullable",
            "telefone"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "nome"=>$request->nome,
            "documento"=>$request->documento,
            "telefone"=>$request->telefone,
            ];
            return Usuario::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return Usuario::where(["id"=>$id])->delete();
    }

}