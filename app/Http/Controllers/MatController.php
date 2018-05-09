<?php

namespace App\Http\Controllers;
use App\Matiere;
use App\matCateg;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Annee;
use App\Programm;
use App\Niveau;
use App\Periode;
use App\Time;
use App\Group;
use DB;
use App\Classe;
use App\MatiereProgramme;
class MatController extends Controller
{

public function getMatiere(){

    $program = Programm::all();
    $annees=Annee::orderBy('id_annee','DESC')->get();
    $niveau=niveau::all();
    $matiere=Matiere::all();

  return view('matiere.ListMatiere',compact('program','annees','niveau','matiere'));
}


public  function  viewMatiere(){
    $classes = DB::table('mat_prog')
         ->join('annees','annees.id_annee','=','mat_prog.id_annee')
          ->join('niveaux','niveaux.id_niveau','=','mat_prog.id_niveau')
           ->join('matieres','matieres.id_matiere','=','mat_prog.id_matiere')
           ->join('programms','programms.id_programm','=','mat_prog.id_programm')
           ->orderBy('annees.id_annee','DESC')
             ->orderBy('niveaux.id_niveau','ASC')
               ->get();
        $ar=Array('mat_prog'=>$classes);
    return view('matiere.matiereInfo',$ar);
}

//////////////////////insertion///////////////////////
     public function creatematprogramme(Request $request)
     {
         if($request->ajax())
         {
             return response(MatiereProgramme::create($request->all()));
         }
     }















//     public function matRegister(Request $request)
//     {
//         $matiere= new Matiere();
//         $matCateg= new matCateg();
//         $matiere->nom=$request->input('nom');
//         $matiere->description=$request->input('description');
//         $matiere->save();
//
//         return redirect('/matiere/ListMatiere');
//     }
//
//     public function getMatInfo(Request $request)
//         {
//             $matiere = Matiere::all();
//             return view('matiere.ListeMatiere',compact('matiere'));
//                 }
//
//
//
// // public function MatInfo(Request $request)
// //                 {
// //                     if ($request->has('search')) {
// //                         $matiere = Student::where('id_matiere',$request->search)
// //                         ->Orwhere('nom',"LIKE","%".$request->search."%")
// //                         ->select(DB::raw('id_matiere,nom,description')
// //                         ->get();
// //                     }
//
// //                     return view('matiere.ListeMatiere',compact('matiere'));
// //                 }
//
// public function destroy($id)
//     {
//         $matiere = Matiere::find($id);
//         $matiere->delete();
//
//         return redirect('/matiere/ListMatiere')->with('success', 'Ticket has been deleted!!');
//     }
//
//     public function update(Request $request, $id)
//     {
//         $matiere= new Matiere();
//         $data = $this->validate($request, [
//             'nom'=>'required',
//             'description'=> 'required'
//         ]);
//         $data['id_matiere'] = $id;
//         $matiere->updateMat($data);
//
//         return redirect('/home')->with('success', 'New support ticket has been updated!!');
//     }
//
//     public function edit($id)
//     {
//         $ticket = Ticket::where('user_id', auth()->user()->id)
//                         ->where('id', $id)
//                         ->first();
//
//         return view('user.edit', compact('ticket', 'id'));
//     }
}
