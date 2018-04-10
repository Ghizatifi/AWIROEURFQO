<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $table ='etudiants' ;
  //  protected $fillable = ['id_user','nom','	prenom'];
    protected $primaryKey ='id_eleve';
    public $timestamps =false;
}
