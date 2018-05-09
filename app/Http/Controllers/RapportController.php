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

use Charts;
// use ConsoleTVs\Charts\Charts;
class RapportController extends Controller
{

      public function getListEtudiant(){
        $niveau = Niveau::all();
        $annees=Annee::orderBy('id_annee','DESC')->get();
        $group=Group::all();
        $program=programm::all();
       return view('rapports.ListeEtudiant',compact('niveau','annees','group','program'));
      }

    public function EtudiantList(Request $request){
      $classes = $this->info()->select(DB::raw('etudiants.id_eleve,
     	CONCAT(etudiants.prenom," ",etudiants.nom)as name,(CASE WHEN etudiants.sexe=1 THEN "Garcon"  ELSE "Fille" END)as sex ,etudiants.date_naissance,
     		CONCAT(programms.programe," ",niveaux.niveau,"/",groups.groupe)as program'))
     ->where('classes.id_classe',$request->id_classe)
     ->get();
      return view('rapports.EtudiantInfo',compact('classes'));
    }


    public function info ()
    {

    return Eleve::
    join('classes', 'classes.id_classe', '=', 'etudiants.id_classe')
    ->join('programms', 'programms.id_programm', '=', 'classes.id_programm')
    ->join('niveaux', 'niveaux.id_niveau', '=', 'classes.id_niveau')
    ->join('groups', 'groups.id_group', '=', 'classes.id_group');

    }


    public function getEtudiantListMulitiClass(){


      $niveau = Niveau::all();
      $annees=Annee::orderBy('id_annee','DESC')->get();
      $group=Group::all();
      $program=programm::all();
        			return view('rapports.EtudiantMultiClass',compact('niveau','annees','group','program'));
        }

        public function showEtudiantMultiClass(Request $request){
        	if ($request->ajax()) {
        if (!empty($request['chk'])) {

               $classes = $this->info()
    		->select(DB::raw('etudiants.student_id,
       	         CONCAT(etudiants.prenom," ",etudiants.nom)as name,(CASE WHEN etudiants.sexe=1 THEN "Garcon"  ELSE "Fille" END)as sex ,
       	                etudiants.date_naissance,
       	         CONCAT(programms.programe," ",niveaux.niveau," ",groups.groupe)as program'))->whereIn('classes.id_classe',$request['chk'])
       ->get();
       dump($classes);
        		return view('rapports.EtudiantInfoMultiClass',compact('classes'));
        		//response($request->all());
        	}
        }}


    public function NewStudentRegister(){

      $student = Eleve::where(DB::raw("(DATE_FORMAT(date_inscription,'%Y'))"),date('Y'))->select('date_inscription AS created_at')->get();
            $chart = Charts::database($student, 'bar', 'highcharts')
                ->title("Statistique des inscriptions")
                ->elementLabel("Totale des etudiants")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupByMonth(date('Y'), true);
      return view('rapports.newEtudiantRegister',compact('chart'));

    }


}
