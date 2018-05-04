<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professeur;
use App\Http\Requests;
use Auth;
use App\Post;
class ProfController extends Controller
{

    public function getRegisterationProf(Request $request){
        if ($request->isMethod('post')){
            $ar= new Professeur();
            $ar->nom=$request->input('nom');
            $ar->prenom=$request->input('prenom');
            $ar->sexe=$request->input('sexe');
            $ar->date_naissance=$request->input('date_naissance');
            $ar->telephone=$request->input('telephone');
            $ar->Nationalite=$request->input('Nationalite');
            $ar->ville=$request->input('ville');
            $ar->rue=$request->input('rue');
            $ar->province=$request->input('province');
            $ar->diplome=$request->input('diplome');
            $ar->niveau_scolaire=$request->input('niveau_scolaire');
            $ar->email=$request->input('email');
            $ar->id_user=Auth::user()->id;
            $ar->save();
            return redirect('/gestion/prof/getProf');
        }
    return view('professeur.profRegister');


    }

    public  function  view(){
        $prof= Professeur::all();
        $ar=Array('prof'=>$prof);
        return view('professeur.profList',$ar);
    }


    public function destroy($id)
    {
        $prof = Professeur::find($id);
        $prof->delete();

        return redirect('/gestion/prof/getProf')->with('success', 'prof has been deleted!!');
    }

/////////////////////////////////////////////////////////////////////////////////////////////////
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
      {
          // $prof = Professeur::where('id_user', auth()->user()->id)
          //                 ->where('id_prof', $id)
          //                 ->first();
          $prof = Professeur::find($id);
          return view('professeur.edit', compact('prof'));
      }

      // public function updateProf($data)
      // {
      //         $prof = $this->find($data['id']);
      //         $prof->id_user = auth()->user()->id;
      //         $prof->nom = $data['nom'];
      //         $prof->prenom = $data['prenom'];
      //         $prof->save();
      //         return 1;
      // }
/////////////////////////////////////////////////////////////////////////
/**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
public function update(Request $request, $id)
    {

      $this->validate($request ,[
        'nom'=>'required',
        'prenom'=> 'required'
         ]);
      // request()->validate($request ,[
      //   'nom'=>'required',
      //   'prenom'=> 'required']);
      Professeur::find($id)->update($request->all());
      return redirect('/gestion/prof/getProf')->with('success', 'New support ticket has been updated!!');
    }





   }
