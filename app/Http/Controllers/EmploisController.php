<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annee;
use App\Programm;
use App\Niveau;
use App\Horaire;
use App\Group;
use App\Salle;
use App\Professeur;

use App\Jour;
use App\Matiere;
use App\Emploitemps;

use DB;
use App\Classe;
class EmploisController extends Controller
{

public function createEmplois(){
      $matiere = Matiere::all();
      $jour=Jour::all();
      $salle=Salle::all();
      $horaire=Horaire::all();
      $prof=Professeur::all();


      $niveau = Niveau::all();
      $annees=Annee::orderBy('id_annee','DESC')->get();
      $group=Group::all();
      $program=programm::all();
    return view('emploitemps.create',compact('matiere','jour','salle','horaire','prof','annees','niveau','program','group'));
  }




  public function displayEmplois(){
     $prog = DB::table('emploitemps')
  ->join('classes','classes.id_classe','=','emploitemps.id_classe')
  ->join('jours','jours.id_jour','=','emploitemps.id_jour')
  ->join('matieres','matieres.id_matiere','=','emploitemps.id_matiere')
  ->join('salles','salles.id_salle','=','emploitemps.id_salle')
  ->join('horaires','horaires.id_horaire','=','emploitemps.id_horaire')
  ->join('professeurs','professeurs.id_prof','=','emploitemps.id_prof')
  ->orderBy('classes.id_classe','ASC')
  ->orderBy('jours.id_jour','ASC')

  ->get();
   $ar=Array('classes'=>$prog);
    return view('emploitemps.display',$ar);
  }

  public function createprog(Request $request){
    $ar= new Emploitemps();
    $ar->id_classe=$request->input('id_classe');
    $ar->id_jour=$request->input('id_jour');
    $ar->id_matiere=$request->input('id_matiere');
    $ar->id_prof=$request->input('id_prof');
    $ar->id_salle=$request->input('id_salle');
    $ar->id_horaire=$request->input('id_horaire');
    $ar->save();
    $id_emploi=$ar->id_emploi;
  //  return redirect()->route('createprog');
return view('emploitemps.create');
    // return response(Emploitemps::create($request->all()));
  }
}
