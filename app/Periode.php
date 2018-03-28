<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table ='periode' ;
    protected $fillable = ['periode'];

    protected $primaryKey ='id_periode';
    public $timestamps =false;
}
