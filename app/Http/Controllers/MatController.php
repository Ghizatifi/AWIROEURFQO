<?php

namespace App\Http\Controllers;
use App\Matiere;
use App\matCateg;
use App\Http\Requests;
use Illuminate\Http\Request;

class MatController extends Controller
{
    public function matRegister(Request $request)
    {
        $matiere= new Matiere();
        $matCateg= new matCateg();
        $matiere->nom=$request->input('nom');
        $matiere->description=$request->input('description');
        $matiere->save();
        
        return redirect('/matiere/ListMatiere');
    }

    public function getMatInfo(Request $request)
        {
            $matiere = Matiere::all();
            return view('matiere.ListeMatiere',compact('matiere'));
                }



// public function MatInfo(Request $request)
//                 {
//                     if ($request->has('search')) {
//                         $matiere = Student::where('id_matiere',$request->search)
//                         ->Orwhere('nom',"LIKE","%".$request->search."%")
//                         ->select(DB::raw('id_matiere,nom,description')
//                         ->get();
//                     }
                
//                     return view('matiere.ListeMatiere',compact('matiere'));
//                 }

public function destroy($id)
    {
        $matiere = Matiere::find($id);
        $matiere->delete();

        return redirect('/matiere/ListMatiere')->with('success', 'Ticket has been deleted!!');
    }
    
    public function update(Request $request, $id)
    {
        $matiere= new Matiere();
        $data = $this->validate($request, [
            'nom'=>'required',
            'description'=> 'required'
        ]);
        $data['id_matiere'] = $id;
        $matiere->updateMat($data);

        return redirect('/home')->with('success', 'New support ticket has been updated!!');
    }
            
    public function edit($id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('user.edit', compact('ticket', 'id'));
    }
}
