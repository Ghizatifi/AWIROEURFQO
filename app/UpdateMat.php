<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateMat extends Model
{
    public function updateMat($data)
    {
            $matiere = $this->find($data['id']);
            $matiere->id_matiere = auth()->user()->id;
            $matiere->nom = $data['title'];
            $matiere->description = $data['description'];
            $matiere->save();
            return 1;
    }
