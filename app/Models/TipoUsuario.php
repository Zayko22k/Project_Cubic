<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model{
    protected $table = "tipousuario";
    protected $primaryKey = "idTipoUsuario";
    public $timestamps = false;
    
}