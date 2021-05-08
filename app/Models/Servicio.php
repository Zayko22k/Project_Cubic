<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model{
    protected $table = "servicio";
    protected $primaryKey = "idServicio";
    // protected $fillable = [];

     public $timestamps = false;
}