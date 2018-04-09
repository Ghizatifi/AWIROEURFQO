<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = ['groupe','id_niveau','capacite'];
	protected $primaryKey = 'id_group';

	public $timestamps = false;
}
