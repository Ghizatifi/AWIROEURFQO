<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matCeteg extends Model
{
    protected $table ='categmatiere' ;
    protected $fillable = ['categmatiere'];
    protected $primaryKey ='id_categ';
    public $timestamps =false;
}
