<?php
namespace App\Modules\General\Hospedagem\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\Hospedagem\Repositories\HospedagemRepository;

class HospedagemController extends Controller
{
    private $hospedagemRepository;

    function __construct(HospedagemRepository $hospedagemRepository ){
        $this->hospedagemRepository = $hospedagemRepository;
    }

    public function index(Request $request){
        try {
            $data =  $this->hospedagemRepository->index($request);
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
            $data = $this->hospedagemRepository->show($id);
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
            $data = $this->hospedagemRepository->store($request);
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
            $data = $this->hospedagemRepository->update($request, $id);
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
            $data = $this->hospedagemRepository->destroy($id);
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