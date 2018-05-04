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


public function showMatInformation(Request $request){

      if ($request->id_annee!="" && $request->id_programm=="")
      {
             $filter = ['annees.id_annee'=>$request->id_annee];
   }

       if (
           $request->id_annee!="" &&
            $request->id_programm!="" &&
        $request->id_niveau!=""

          )
        {
          $filter = [
          'annees.id_annee'=>$request->id_annee,
           'programms.id_programm'=>$request->id_programm,
            'niveaux.id_niveau'=>$request->id_niveau];

               }

         $classes = $this->MatInformation($filter)->get();
         return view('classes.classeInfo',compact('classes'));

     }


     public function  MatInformation($filter)
     {
        return Classe::
         join('annees','annees.id_annee','=','classes.id_annee')
         ->join('niveaux','niveaux.id_niveau','=','classes.id_niveau')
          ->join('programms','programms.id_programm','=','niveaux.id_programm')
          ->where($filter)
          ->orderBy('classes.id_classe','DESC');

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
