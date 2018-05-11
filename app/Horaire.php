<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
  protected $table ='horaires';
  protected $fillable = ['heure_d','heure_f'];

 protected $primaryKey ='id_horaire';
 public $timestamps =false;
}
