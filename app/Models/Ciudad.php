<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model{
    protected $table = "ciudad";
    protected $primaryKey = "idCiudad";

    public $timestamps = false;
    
}