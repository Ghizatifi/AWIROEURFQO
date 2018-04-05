<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statue extends Model
{
    protected $table ='status' ;
    protected $fillable = ['id_eleve','id_classe'];

   protected $primaryKey ='id_status';
   public $timestamps =false;
}
