<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisEtudiant extends Model
{
  protected $table= 'fraisetudiants';
   protected $fillable =['id_eleve','id_niveau','id_frais','montant',

                       ];
   protected $primaryKey = 'id_frais_etudiant';
   public $timestamps = false;
}
