<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    
    protected $table = "usuario";
    protected $primaryKey = "idUsuario";
    protected $foreignId = 'TipoUsuario_idTipoUsuario';
    public $timestamps = false;
    
}