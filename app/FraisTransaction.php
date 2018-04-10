<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisTransaction extends Model
{
  protected $table= 'transactions';
  protected $fillable =['date',
            'remark',
            'description',
            'paye',
            'id_frais',
            'id_eleve',
            'id_user',
            'id_frais_etudiant'
                      ];
  protected $primaryKey = 'id_transaction';
  public $timestamps = false;
}
