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
class EleveController extends Controller
{
//     public function getRegisterationEleve(){
//
//         $annees=Annee::orderBy('id_annee','DESC')->get();
//         $program = Matiere::all();
//         $niveau = Niveau::all();
//       //  $niveau=Niveau::orderBy('id_niveau','DESC')->get();
//          $group=Group::all();
//          $id_eleve =Eleve::max('id_eleve');
//
//     return view('eleves.eleveRegister',compact('annees','program','group','niveau','id_eleve'));
// }



/////////////////////////////////////////////////////////////////////////////////////

    public function postRegisterationSEleve(Request $request)
	    	{
        return $request->all();
        }



        public function getUnivInfo(Request $request)
        {
            //$niveau = Niveau::where('id_programm',$request->id_programm)->get();
            $niveau = Niveau::all();
            $annees=Annee::orderBy('id_annee','DESC')->get();
            $group=Group::all();
            $programs=programm::all();
            return view('eleves.eleveRegister',compact('annees','niveau','programs','group'));
        }

/////////////////////////////////////////////////////////////////////////////////////

public function RegisterEleve(Request $request){
  //  if ($request->isMethod('post')){
        $ar= new Eleve();
        $ar->nom=$request->input('nom');
        $ar->prenom=$request->input('prenom');
        $ar->sexe=$request->input('sexe');
        $ar->nationalite=$request->input('nationalite');
        $ar->date_naissance=$request->input('date_naissance');
        $ar->phone=$request->input('phone');
        $ar->ville=$request->input('ville');
        $ar->rue=$request->input('rue');
        $ar->province=$request->input('province');
        $ar->nom_Pere=$request->input('nom_Pere');
        $ar->nom_Mere=$request->input('nom_Mere');
        $ar->phone=$request->input('phone');
        $ar->fix=$request->input('fix');
        $ar->adresse_travail=$request->input('adresse_travail');
        $ar->phone_urgence=$request->input('phone_urgence');
        $ar->email=$request->input('email');
        $ar->id_user=Auth::user()->id;
        $ar->photo=FileUpload::photo($request,'photo');
        // $ar->id_annee=$request->input('id_annee');
        // $ar->id_group=$request->input('id_group');
        // $ar->id_niveau=$request->input('id_niveau');

        $ar->save();
        return redirect('/gestion/eleveList');
    //}
//return view('eleves.eleveRegister');



}


public  function  view(){
    $eleve= Eleve::all();
    $ar=Array('eleve'=>$eleve);
    return view('eleves.eleveList',$ar);
}

//////////////////////////////////////////////

public function edit($id)
    {
        $eleve = Eleve::where('id_user', auth()->user()->id)
                        ->where('id_eleve', $id)
                        ->first();

        return view('eleves.edit', compact('eleve', 'id'));
    }


    ////////////////////////////////////////
    public function update(Request $request, $id)
    {
        $eleve = new Eleve();
        $data = $this->validate($request, [
            'nom'=>'required',
            'prenom'=> 'required'
        ]);
        $data['id_eleve'] = $id;
        $eleve->updateEleve($data);

        return redirect('contact')->with('success', ' student has been updated!!');
    }
    //////////////////////////////////
    public function updateEleve($data)
{
        $eleve = $this->find($data['id_eleve']);
        $eleve->id_user = auth()->user()->id;
        $eleve->nom = $data['nom'];
        $eleve->prenom = $data['prenom'];
        $eleve->save();
        return 1;
}

}
