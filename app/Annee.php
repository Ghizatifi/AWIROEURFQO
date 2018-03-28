<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    protected $table ='annees' ;
     protected $fillable = ['annees'];

    protected $primaryKey ='id_annee';
    public $timestamps =false;
}
