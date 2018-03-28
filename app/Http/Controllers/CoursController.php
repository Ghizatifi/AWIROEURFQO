<?php

namespace App\Http\Controllers;
use App\Annee;
use App\Matiere;

use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }


    public function getMangeCouress()
    {
        $program = Matiere::all();
        $annees=Annee::orderBy('id_annee','DESC')->get();
        return view('cours.gestionCours',compact('program','annees'));


            }


            
public function postInsertYear(Request $request)
{
   if ($request->ajax()) {
       return response(Annee::create($request->all()));
   }
}


public function postInsertProgram(Request $request)
    {
       if ($request->ajax()) {
           return response(Matiere::create($request->all()));
       }
    }

}
