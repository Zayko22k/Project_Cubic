<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model{
    protected $table = "detallecotizacion";
    protected $primaryKey = "idDetalleCoti";
    // protected $fillable = [];

     public $timestamps = false;
    
}