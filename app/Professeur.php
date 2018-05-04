<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{

    protected $table ='professeurs' ;
    protected $fillable = ['nom','prenom','sexe','date_naissance'.
    'telephone','Nationalite','ville','rue','province','diplome','niveau_scolaire'];
     protected $primaryKey ='id_prof';
//    public $timestamps =false;
}
