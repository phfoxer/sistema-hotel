<?php
namespace App\Modules\General\Preco\Models;
use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    protected $table    = "preco";
    protected $fillable = ['id','dia','valor_diaria','valor_garagem'];

}