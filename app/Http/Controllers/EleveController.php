<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annee;
use App\Matiere;
use App\Niveau;
use App\Periode;
use App\Time;
use App\Group;
use App\Eleve;
class EleveController extends Controller
{
    public function getRegisterationEleve(){

        $annees=Annee::orderBy('id_annee','DESC')->get();
         $program = Matiere::all();
        // $shift=Shift::all();
        $niveau=Niveau::orderBy('id_niveau','DESC')->get();
         $time=Time::all();
         $periode=Periode::all();
         $group=Group::all();
         $id_eleve =Eleve::max('id_eleve');



    return view('eleves.eleveRegister',compact('annees','program','group','periode','time','niveau','id_eleve'));
}



/////////////////////////////////////////////////////////////////////////////////////        

public function postRegisterationSEleve(Request $request)
		{
        return $request->all();
            
        }



/////////////////////////////////////////////////////////////////////////////////////        
}
