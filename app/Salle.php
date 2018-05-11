<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
  protected $table ='salles' ;
  protected $fillable = ['salle'];

 protected $primaryKey ='id_salle';
 public $timestamps =false;
}
