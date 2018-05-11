<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
  protected $table ='jours' ;
  protected $fillable = ['jour'];

 protected $primaryKey ='id_jour';
 public $timestamps =false;
}
