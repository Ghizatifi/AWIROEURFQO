<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annee;
use App\Matiere;
use App\Programm;
use App\Niveau;
use App\Periode;
use App\Time;
use App\Statue;
use App\Group;
use App\frais;
use App\FraisType;
use App\FraisTransaction;
use App\Reçus;
use App\FileUpload;
use File;
use Storage;
use DB;
use App\Http\Requests;
use Auth;
use App\Eleve;

class PayementController extends Controller
{
      public function getFeePayment()
    {
       return view('payements.searchPymeant');
    }



    public function Etudiant_Prog($studentId)
    {
    return Eleve::
      join('classes','classes.id_classe','=','etudiants.id_classe')
      ->join('annees','annees.id_annee','=','classes.id_annee')
      ->join('groups','groups.id_group','=','classes.id_group')
       ->join('niveaux','niveaux.id_niveau','=','classes.id_niveau')
        ->join('programms','programms.id_programm','=','niveaux.id_programm')
        ->select('etudiants.*','programms.*','niveaux.*','groups.*','annees.*')
      ->where('etudiants.id_eleve',$studentId)
      ->get();
    }

    public function payment($viewNmae,$id_eleve)
    {
      // $fraistype = FraisType::all();
      $status = $this->Etudiant_Prog($id_eleve)->first();

       $program = Programm::where('id_programm',$status->id_programm)->get();
       $niveau=Niveau::where('id_programm',$status->id_programm)->get();

       $fraisEtudiant = $this->show_school_fee($status->level_id)->first();
       $id_recus= Reçus::where('id_eleve',$id_eleve)->max('id_reçus');
       // $readstudentFee= $this->read_Student_Fee($id_eleve)->get();
       // $readstudentTrans= $this->read_Student_Transactation($id_eleve)->get();

      return view($viewNmae,compact('status','program','niveau'))->with('id_eleve',$id_eleve);
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function showStudentPayment(Request $request)
    {
     $id_eleve =$request->id_eleve;
     return $this->payment('payements.payment',$id_eleve);


    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function show_school_fee($level_id)
{
       return	Frais::join('annees','annees.id_annee','=','frais.id_annee')
       ->join('niveaux','niveaux.id_niveau','=','frais.id_niveau')
       ->join('programms','programms.id_programm','=','niveaux.id_programm')
       ->join('fraistype','fraistype.id_fraistype','=','frais.id_fraistype')
       // ->where('niveaux.id_niveau',$id_niveau)
       ->orderBy('frais.montant','DESC');
}
}
