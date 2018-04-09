<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table ='niveaux' ;
    protected $fillable = ['niveau','id_programm','description'];
    protected $primaryKey ='id_niveau';
    public $timestamps =false;
}
