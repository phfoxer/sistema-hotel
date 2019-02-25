<?php
namespace App\Modules\General\Hospedagem\Repositories;
use App\Modules\General\Hospedagem\Models\Hospedagem;
use App\Modules\General\Hospedagem\Repositories\HospedagemSearchRepository;
use Validator;
use Illuminate\Http\Request;

class HospedagemRepository
{
    private $hospedagemSearchRepository;
    function __construct(HospedagemSearchRepository $hospedagemSearchRepository){
        $this->hospedagemSearchRepository = $hospedagemSearchRepository;
    }

    public function index(Request $request){
        return $this->hospedagemSearchRepository->search(Hospedagem::with(["hospede"]), $request);
    }

    public function show($id){
    	return Hospedagem::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "usuario_id"=>"nullable",
            "entrada"=>"nullable",
            "saida"=>"nullable",
            "garagem"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "usuario_id"=>$request->usuario_id,
            "entrada"=> date('Y-m-d H:i:s',strtotime( $request->entrada) ),
            "saida"=> date('Y-m-d H:i:s',strtotime( $request->saida ) ),
            "garagem"=>($request->garagem === 'true') ? 1 : 0,
            ];
            return Hospedagem::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "usuario_id"=>"nullable",
            "entrada"=>"nullable",
            "saida"=>"nullable",
            "garagem"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "usuario_id"=>$request->usuario_id,
            "entrada"=> date('Y-m-d H:i:s',strtotime( $request->entrada) ),
            "saida"=> date('Y-m-d H:i:s',strtotime( $request->saida ) ),
            "garagem"=>($request->garagem === 'true') ? 1 : 0,
            ];
            return Hospedagem::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return Hospedagem::where(["id"=>$id])->delete();
    }

}