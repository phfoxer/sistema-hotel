<?php
namespace App\Modules\General\Hospedagem\Models;
use Illuminate\Database\Eloquent\Model;
use App\Modules\General\Preco\Models\Preco;
use DateTime;
use DatePeriod;
use DateInterval;

class Hospedagem extends Model
{
    protected $table    = "hospedagem";
    protected $fillable = ['id','usuario_id','entrada','saida','garagem'];
    protected $visible = ['id','usuario_id','entrada','saida','garagem','hospede','custo'];
    protected $appends = ['custo'];

    public function hospede(){
        return $this->hasOne("App\Modules\General\Usuario\Models\Usuario","id","usuario_id");
    }

    public function getCustoAttribute()
    {
        $valor = 0;
        $dias = $this->diasHospedagem();
        foreach ($dias as $key => $data) {
            if ($key < (sizeof($dias)-1)) {
                $tabela = $this->tabelaPreco(date('w',strtotime($data)));
                $valor = $valor + $tabela->valor_diaria;
                if ($this->garagem === 1) {
                    $valor = $valor + $tabela->valor_garagem;
                }
            }
        }
        $saida = $this->saida;
        $tabela = $this->tabelaPreco( date( 'w', strtotime($saida) ) );
        // Se sair depois do horário de corte
        if (strtotime($saida) >= strtotime(date('Y-m-d',strtotime($saida)).' 16:30:00')) {
           $valor = $valor + $tabela->valor_diaria;
        }
        return  $valor;
    }

    private function diasHospedagem():Array {
        $dias = [];
        $periodo = new DatePeriod(
            new DateTime($this->entrada),
            new DateInterval('P1D'),
            new DateTime($this->saida)
        );
        foreach ($periodo as $key => $dia) {
            $dias[] = $dia->format('Y-m-d');
        };
        return $dias;
    }

    private function tabelaPreco($dia):Object
    {
        return Preco::where('dia','=',$dia)->first();
    }
}