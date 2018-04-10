<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisType extends Model
{
  protected $table= 'fraistype';
  protected $fillable =['type'];
  protected $primaryKey = 'id_fraistype';
  public $timestamps = false;
}
