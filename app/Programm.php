<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programm extends Model
{
    protected $table ='programms' ;
    protected $fillable = ['id_programm','nom'];
    public $timestamps =false;
}
