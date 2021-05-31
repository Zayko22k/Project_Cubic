<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model{
    protected $table = "material";
    protected $primaryKey = "idMaterial";
    // protected $fillable = [];

     public $timestamps = false;
    
}