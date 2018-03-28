<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table ='niveaux' ;
    protected $fillable = ['id_matiere','niveau','description'];

    protected $primaryKey ='id_niveau';
    public $timestamps =false;
}
