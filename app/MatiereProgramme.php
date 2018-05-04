<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatiereProgramme extends Model
{
  protected $table ='mat_prog' ;
  protected $fillable = ['id_matiere','id_program','id_annee','id_niveau'];
 protected $primaryKey ='id_matprog';
 public $timestamps =false;
}
