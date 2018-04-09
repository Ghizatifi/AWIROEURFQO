<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $table ='etudiants' ;
    protected $primaryKey ='id_eleve';
    public $timestamps =false;
}
