<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model{
    protected $table = "tienda";
    protected $primaryKey = "idTienda";
    // protected $fillable = [];

     public $timestamps = false;
    
}