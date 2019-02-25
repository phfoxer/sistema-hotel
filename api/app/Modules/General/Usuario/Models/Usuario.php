<?php
namespace App\Modules\General\Usuario\Models;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table    = "usuario";
    protected $fillable = ['id','nome','documento','telefone'];
    protected $visible = ['id','nome','documento','telefone'];

}