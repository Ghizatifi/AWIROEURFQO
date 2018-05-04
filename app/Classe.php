<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
  protected $table = 'classes';
	protected $fillable = ['id_annee','id_niveau','id_group','id_programm','nom'];
	protected $primaryKey = 'id_classe';
	public $timestamps = false;
}
