<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annee;
use App\Matiere;
use App\Niveau;
use App\Programm;
use App\Group;
use App\FileUpload;
use File;
use Storage;
use DB;
use App\Http\Requests;
use Auth;
use App\Eleve;
class absenceController extends Controller
{
  public  function  view(){

    $program = Programm::all();
    $annees=Annee::orderBy('id_annee','DESC')->get();
    $niveau=niveau::all();
    $groups=Group::all();
    $matiere=Matiere::all();


   $eleve = DB::table('etudiants')
              ->join('classes', 'classes.id_classe', '=', 'etudiants.id_classe')
              ->join('programms', 'programms.id_programm', '=', 'classes.id_program')
              ->select('etudiants.*','programms.*')
              ->where('etudiants.id_eleve', '=', 12)
              ->orderBy('etudiants.id_eleve','DESC')
              ->get();
  $ar=Array('eleve'=>$eleve);

      return view('absence.absence',$ar,compact('program','annees','groups','niveau'));
  }
}
