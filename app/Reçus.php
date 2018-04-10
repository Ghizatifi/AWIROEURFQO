<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reçus extends Model
{
  protected $table= 'reçus';
  protected $fillable =['id_eleve','id_transaction'];
  protected $primaryKey = 'id_reçus';
  public $timestamps = false;
}
