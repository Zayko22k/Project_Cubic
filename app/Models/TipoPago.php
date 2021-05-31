<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model{
    protected $table = "tipopago";
    protected $primaryKey = "idTipoPago";
    // protected $fillable = [];

     public $timestamps = false;
    
}