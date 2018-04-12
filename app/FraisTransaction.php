<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisTransaction extends Model
{
  protected $table= 'transactions';
  protected $fillable =['date',
            'type_paiement',
            'paye',
            'id_eleve',
            'id_user',
            'id_frais_etudiant',
            'id_frais'

                      ];
  protected $primaryKey = 'id_transaction';
  public $timestamps = false;
}
