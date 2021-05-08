<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes_Bloqueados extends Model{
    protected $table = "cliente_bloqueados";
    protected $primaryKey = "idCliente_Bloqueados";
    // protected $fillable = [];
   // protected $foreignId = 'Usuario_idUsuario';
     public $timestamps = false;
    
}