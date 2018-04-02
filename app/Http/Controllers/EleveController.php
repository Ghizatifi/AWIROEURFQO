<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annee;
use App\Matiere;
use App\Niveau;
use App\Periode;
use App\Time;
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
    public function getRegisterationEleve(){

        $annees=Annee::orderBy('id_annee','DESC')->get();
        $program = Matiere::all();
        // $shift=Shift::all();
        $niveau=Niveau::orderBy('id_niveau','DESC')->get();
         $time=Time::all();
         $periode=Periode::all();
         $group=Group::all();
         $id_eleve =Eleve::max('id_eleve');



    return view('eleves.eleveRegister',compact('annees','program','group','periode','time','niveau','id_eleve'));
}



/////////////////////////////////////////////////////////////////////////////////////        

public function postRegisterationSEleve(Request $request)
		{
        return $request->all();
            
        }

        public function getUnivInfo()
        {
            $niveau = Niveau::all();
            $annees=Annee::orderBy('id_annee','DESC')->get();
            $program=Group::all();
            return view('eleves.eleveRegister',compact('program','groups','annees','niveau'));
    
    
                }

/////////////////////////////////////////////////////////////////////////////////////        

public function RegisterEleve(Request $request){
    if ($request->isMethod('post')){
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
        $ar->id_user=Auth::user()->id;
        $ar->id_user=Auth::user()->id;
     
        $ar->save();
        return view('eleves.eleveList');
    }
return view('eleves.eleveRegister');



}


public  function  view(){
    $eleve= Eleve::all();
    $ar=Array('eleve'=>$eleve);
    return view('eleves.eleveList',$ar);
}

}
