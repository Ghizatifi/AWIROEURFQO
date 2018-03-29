<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professeur;
use App\Http\Requests;
use Auth;
class ProfController extends Controller
{

    public function getRegisterationProf(Request $request){
        if ($request->isMethod('post')){
            $ar= new Professeur();
            $ar->nom=$request->input('nom');
            $ar->prenom=$request->input('prenom');
            $ar->sexe=$request->input('sexe');
            $ar->date_naissance=$request->input('date_naissance');
            $ar->telephone=$request->input('telephone');
            $ar->Nationalite=$request->input('Nationalite');
            $ar->ville=$request->input('ville');
            $ar->rue=$request->input('rue');
            $ar->province=$request->input('province');
            $ar->diplome=$request->input('diplome');
            $ar->niveau_scolaire=$request->input('niveau_scolaire');
            $ar->id_user=Auth::user()->id;
            $ar->save();
            return redirect('/gestion/eleveList');
        }
    return view('professeur.profRegister');


    }

    public  function  view(){
        $prof= Professeur::all();
        $ar=Array('prof'=>$prof);
        return view('professeur.profList',$ar);
    }
}
