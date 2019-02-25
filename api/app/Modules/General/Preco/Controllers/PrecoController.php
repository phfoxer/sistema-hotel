<?php
namespace App\Modules\General\Preco\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\Preco\Repositories\PrecoRepository;

class PrecoController extends Controller
{
    private $precoRepository;

    function __construct(PrecoRepository $precoRepository ){
        $this->precoRepository = $precoRepository;
    }

    public function index(Request $request){
        try {
            $data =  $this->precoRepository->index($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 401);
        }
    }

    public function show($id){
        try {
            $data = $this->precoRepository->show($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function store(Request $request){
        try {
            $data = $this->precoRepository->store($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message "=> "Error, try again!",
                "code" => $e->getCode(),
                "text "=>    $e->getMessage()
            ];
            return response()->json($data, ($e->getCode()==0) ? 400 : $e->getCode());
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $this->precoRepository->update($request, $id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message" => "Error, try again!",
                 "code" => $e->getCode(),
                "text" =>    $e->getMessage()
            ];
            return response()->json($data, ($e->getCode()==0) ? 400 : $e->getCode());
        }
    }

    public function destroy($id){
        try {
            $data = $this->precoRepository->destroy($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

}