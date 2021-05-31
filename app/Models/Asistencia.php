<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model{
    protected $table = "asistencia";
    protected $primaryKey = "idAsistencia";
    // protected $fillable = [];

     public $timestamps = false;
    
}