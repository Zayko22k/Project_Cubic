<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model{
    protected $table = "inmueble";
    protected $primaryKey = "idInmueble";

    public $timestamps = false;
}