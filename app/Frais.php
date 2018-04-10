<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
  protected $table= 'frais';
  protected $fillable =['id_annee',
            'id_niveau',
            'id_fraistype',
            'montant'
                      ];
  protected $primaryKey = 'id_frais';
  public $timestamps = false;
}
