<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
  // protected $table ='events' ;
  // protected $fillable = ['nom_event','date_debut','date_fin','color'];
  // protected $primaryKey ='id_event';
  // public $timestamps =false;

  /**
   * [$table description]
   * @var string
   */
  protected $table = 'events';

  /**
   * [$fillable description]
   * @var [type]
   */
  protected $fillable = [
      'title', 'start', 'end', 'color'
  ];
}
