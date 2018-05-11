<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploitemps extends Model
{
  protected $table = 'emploitemps';
  protected $fillable = ['id_classe','id_jour','id_matiere','id_salle','id_horaire','id_prof'];
  protected $primaryKey = 'id_emploi';
  public $timestamps = false;
}
