<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
  protected $table ='absences' ;
//protected $fillable = ['id_user','nom','	prenom'];
  protected $primaryKey ='id_absence';
  public $timestamps =true;
}
