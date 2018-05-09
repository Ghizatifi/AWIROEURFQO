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
            $program=programm::all();
            return view('eleves.eleveRegister',compact('annees','niveau','program','group'));
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
        $ar->id_classe=$request->input('id_classe');
        $ar->date_inscription=$request->input('dateregistred');
        // $ar->id_niveau=$request->input('id_niveau');

        $ar->save();
        $id_eleve=$ar->id_eleve;
        //return redirect('/gestion/eleveList');
        return redirect()->route('goPayment',['id_eleve'=>$id_eleve]);

    //}
//return view('eleves.eleveRegister');



}


public  function  view(){
    // $eleve= Eleve::all();
    // $ar=Array('eleve'=>$eleve);
 $eleve = DB::table('etudiants')
       //return Eleve::
            ->join('classes', 'classes.id_classe', '=', 'etudiants.id_classe')
            ->join('programms', 'programms.id_programm', '=', 'classes.id_programm')
            ->join('niveaux', 'niveaux.id_niveau', '=', 'classes.id_niveau')

            ->select('etudiants.*','programms.*','niveaux.*')
            ->orderBy('etudiants.id_eleve','DESC')
            ->get();
     $ar=Array('eleve'=>$eleve);

    return view('eleves.eleveList',$ar);
}

public function showStdInformation(Request $request){
          $filter = [
          'annees.id_annee'=>$request->id_annee,
           'programms.id_programm'=>$request->id_programm,
            'niveaux.id_niveau'=>$request->id_niveau,
             'groups.id_group'=>$request->id_group];
         $eleve = $this->view($filter)->get();
      return view('eleves.eleveList',compact('eleve'));

     }


     // public  function  View(){
     //     $classes= Classe::all();
     //     $ar=Array('classes'=>$classes);
     //     return view('classes.classeInfo',$ar);
     // }



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



public function studentInfo(Request $request)
{
	if ($request->has('search')) {

			$eleve = Eleve::where('id_eleve',$request->search)
			->Orwhere('prenom',"LIKE","%".$request->search."%")
			->Orwhere('nom',"LIKE","%".$request->search."%")
			->select(DB::raw('id_eleve,email,province,rue,photo,ville,prenom,nom,CONCAT(prenom," ",nom) AS nom_complet,
      CONCAT(rue," ",ville," ",province) AS adresse,
  				(CASE WHEN sexe=0 THEN "M" ELSE "F" END) AS sexe ,date_naissance'))
			->paginate(1);

	}
	else{
		$eleve = Eleve::select(DB::raw('id_eleve,email,photo,province,rue,ville,prenom,nom,CONCAT(prenom," ",nom) AS nom_complet,
    CONCAT(rue," ",ville," ",province) AS adresse,
				(CASE WHEN sexe=0 THEN "M" ELSE "F" END) AS sexe ,date_naissance'))
		->paginate(1)->appends('search',$request->search);

	}
	return view('eleves.eleveList',compact('eleve'));
}


      public function formImport(){
         return view('eleves.upload');
      }


  
}
