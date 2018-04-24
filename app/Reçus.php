<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reçus extends Model
{
  protected $table= 'recus';
  protected $fillable =['id_transaction','id_eleve'];
  protected $primaryKey = 'id_reçus';
  public $timestamps = false;

  static public function autoNumber()
        {
          $id = 0;
          $id_reçus= Reçus::max('id_reçus');
          if ($id_reçus!=0) {
            $id =$id_reçus+1;
            Reçus::insert(['id_reçus'=>$id]);
          }
            else{
              $id =1;
              Reçus::insert(['id_reçus'=>$id]);
            }
  return $id;
}

}
