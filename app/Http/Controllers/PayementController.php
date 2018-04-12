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
use App\FraisEtudiant;
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
//////////////////////////////////////////////////////////////////////////////
    public function payment($viewNmae,$id_eleve)
    {
      $fraistype = FraisType::all();
      $status = $this->Etudiant_Prog($id_eleve)->first();

       $program = Programm::where('id_programm',$status->id_programm)->get();
       $niveau=Niveau::where('id_programm',$status->id_programm)->get();

       $fraisEtudiant = $this->show_school_fee($status->id_niveaus)->first();
       $id_reçus= Reçus::where('id_eleve',$id_eleve)->max('id_reçus');
      $readstudentFee= $this->read_Student_Fee($id_eleve)->get();
      $readstudentTrans= $this->read_Student_Transactation($id_eleve)->get();

      return view($viewNmae,compact('status','program','niveau','fraisEtudiant','id_reçus','readstudentFee','readstudentTrans','fraistype' ))->with('id_eleve',$id_eleve);
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

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function goPayment($student_id)
    {
     return $this->payment('payements.payment',$student_id);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function savePayment(Request $request)
    {
      $studentfee =FraisEtudiant::create($request->all());

      $transact =FraisTransaction::create([
        'date'=>$request->date,
        'id_user'=>$request->id_user,
        'description'=>$request->description,
        'id_frais_etudiant'=>$studentfee->id_frais_etudiant,
        'paye'=>$request->montant,
        'id_eleve'=>$request->id_eleve,
        'id_frais'=>$request->id_frais,
        'type_paiement'=>$request->type_paiement

      ]);

      $id_reçus =Reçus::autoNumber();
      Reçus::create([
       'id_reçus'=>$id_reçus,
       'id_eleve'=>$request->id_eleve,
       'id_transaction'=>$transact->id_transaction

     ]);
     return back();
// return $request->all();
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      public function read_Student_Fee($student_id)
      {
              return FraisEtudiant::join('frais','frais.id_frais','=','fraisetudiants.id_frais')
              ->join('etudiants','etudiants.id_eleve','=','fraisetudiants.id_eleve')
              ->join('niveaux','niveaux.id_niveau','=','fraisetudiants.id_niveau')
              ->join('programms','programms.id_programm','=','niveaux.id_programm')
              ->select('niveaux.id_niveau',
                'niveaux.niveau',
                'programms.programe',

                'frais.montant as school_fee',
                'etudiants.id_eleve',
                'fraisetudiants.id_frais_etudiant',
                'fraisetudiants.montant as student_amount'
                // ,'fraisetudiants.discount'
                )
              ->where('etudiants.id_eleve',$student_id)
                ->orderBy('fraisetudiants.id_frais_etudiant','ASC');
      }

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      public function read_Student_Transactation($student_id){
        return Reçus::join('transactions','transactions.id_transaction','=','recus.id_transaction')
        ->join('etudiants','etudiants.id_eleve','=','recus.id_eleve')
        ->join('frais','frais.id_frais','=','transactions.id_frais')
        ->join('users','users.id','=','transactions.id_user')
        ->where('etudiants.id_eleve',$student_id);

      }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      public function createFrais(Request $request){

        if ($request->ajax()) {

          return response(Frais::create($request->all()));
        }
      }
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      public function pay(Request $request){

        if ($request->ajax()) {
        # code...


         $etdPay=FraisEtudiant::join('niveaux','niveaux.id_niveau','=','fraisetudiants.id_niveau')
         ->join('etudiants','etudiants.id_eleve','=','fraisetudiants.id_eleve')
         ->join('frais','frais.id_frais','=','fraisetudiants.id_frais')
         ->join('programms','programms.id_programm','=','niveaux.id_programm')
         ->select('niveaux.id_niveau',
          'niveaux.niveau',
          'frais.id_frais',
          'programms.id_programm',
          'programms.programe',
          'etudiants.id_eleve',
          'fraisetudiants.id_frais_etudiant',
          'frais.montant as school_fee',
          'fraisetudiants.montant as student_amount'
          )
         ->where('fraisetudiants.id_frais_etudiant',$request->id_frais_etudiant)->first();
       }
       return response($etdPay);
      }
      //////////////////////////////////////////////////////////////////
}
