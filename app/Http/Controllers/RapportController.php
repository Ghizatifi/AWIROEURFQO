<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annee;
use App\Programm;
use App\Niveau;
use App\Classe;
use App\Eleve;
use App\User;
use App\Group;
use DB;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

use Charts;
// use ConsoleTVs\Charts\Charts;
class RapportController extends Controller
{

      public function getListEtd(){
        $niveau = Niveau::all();
        $annees=Annee::orderBy('id_annee','DESC')->get();
        $group=Group::all();
        $program=programm::all();
       return view('rapport.studentList',compact('annees','niveau','program','group'));
      }


  // /////////////////////////////////
  //
  	public function getstudentInfo(Request $requests)
  	{
  		$classes = $this->info()
  		->select(DB::raw('etudiants.id_eleve,
     	CONCAT(etudiants.nom," ",etudiants.prenom)as name,(CASE WHEN etudiants.sexe=0 THEN "Garcon"  ELSE "Fille" END)as sexe ,etudiants.date_naissance,
     		CONCAT(programms.programe," / ",niveaux.niveau)as program'))
     ->where('classes.id_classe',$request->id_classe)
     ->get();
  		return view('rapport.studentInfo',compact('classes'));
  	}
  //
  //   //////////////////////////////////////////////////////
    public function info ()
  	{

    return Classe::
    join('etudiants','etudiants.id_eleve','=','classes.id_eleve')
  //  ->join('classes','classes.id_classe','=','etudiants.id_classe')
     ->join('annees','annees.id_annee','=','classes.id_annee')
     ->join('niveaux','niveaux.id_niveau','=','classes.id_niveau')
     ->join('groups', 'groups.id_group','=','classes.id_group')
     ->join('programms','programms.id_programm','=','niveaux.id_programm');

  	}
  //
  //




    public function NewStudentRegister(){

      $student = Eleve::where(DB::raw("(DATE_FORMAT(date_inscription,'%Y'))"),date('Y'))->select('date_inscription AS created_at')->get();
            $chart = Charts::database($student, 'bar', 'highcharts')
                ->title("Satitistique des registrement")
                ->elementLabel("Totale des etudiants")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupByMonth(date('Y'), true);
      return view('rapport.newStudentRegister',compact('chart'));

    }

}
