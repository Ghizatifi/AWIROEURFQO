<?php

namespace App\Http\Controllers;
use App\Matiere;
use App\Http\Requests;
use Illuminate\Http\Request;

class MatController extends Controller
{
    public function matRegister(Request $request)
    {
        $matiere= new Matiere();
        $matiere->nom=$request->input('nom');
        $matiere->description=$request->input('description');
        $matiere->save();
        $matiere = Matiere::all();
        return view('matiere.ListeMatiere',compact('matiere'));
    }

    public function getMatInfo(Request $request)
        {
            $matiere = Matiere::all();
            return view('matiere.ListeMatiere',compact('matiere'));
                }


            
}
