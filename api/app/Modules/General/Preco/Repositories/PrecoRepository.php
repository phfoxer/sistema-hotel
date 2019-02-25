<?php
namespace App\Modules\General\Preco\Repositories;
use App\Modules\General\Preco\Models\Preco;
use App\Modules\General\Preco\Repositories\PrecoSearchRepository;
use Validator;
use Illuminate\Http\Request;

class PrecoRepository
{
    private $precoSearchRepository;
    function __construct(PrecoSearchRepository $precoSearchRepository){
        $this->precoSearchRepository = $precoSearchRepository;
    }

    public function index(Request $request){
        return $this->precoSearchRepository->search(Preco::with([]), $request);
    }

    public function show($id){
    	return Preco::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "dia"=>"nullable",
            "valor_diaria"=>"nullable",
            "valor_garagem"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "dia"=>$request->dia,
            "valor_diaria"=>$request->valor_diaria,
            "valor_garagem"=>$request->valor_garagem,
            ];
            return Preco::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "dia"=>"nullable",
            "valor_diaria"=>"nullable",
            "valor_garagem"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "dia"=>$request->dia,
            "valor_diaria"=>$request->valor_diaria,
            "valor_garagem"=>$request->valor_garagem,
            ];
            return Preco::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return Preco::where(["id"=>$id])->delete();
    }

}