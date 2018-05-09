<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $table ='matieres' ;
    protected $fillable = ['matiere'];

   protected $primaryKey ='id_matiere';
   public $timestamps =false;
}
