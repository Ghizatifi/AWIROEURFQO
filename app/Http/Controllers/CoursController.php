<?php

namespace App\Http\Controllers;
use App\Annee;
use App\Matiere;
use App\Niveau;
use App\Periode;
use App\Time;
use App\Group;

use Illuminate\Http\Request;

class CoursController extends Controller
{
  
////////////////////////////////////////////////////////////////////////
    public function __construct()
    {
        $this->middleware('web');
    }

////////////////////////////////////////////////////////////////////////
    public function getMangeCouress()
    {
        $program = Matiere::all();
        $periode=Periode::all();
        $annees=Annee::orderBy('id_annee','DESC')->get();
        $time=Time::all();
        $groups=Group::all();
        return view('cours.gestionCours',compact('program','annees','groups','periode','time'));


            }


////////////////////////////////////////////////////////////////////////            
public function postInsertYear(Request $request)
{
   if ($request->ajax()) {
       return response(Annee::create($request->all()));
   }
}

////////////////////////////////////////////////////////////////////////
public function postInsertProgram(Request $request)
    {
       if ($request->ajax()) {
           return response(Matiere::create($request->all()));
       }
    }
////////////////////////////////////////////////////////////////////////
    public function postInsertLevel(Request $request)
    {
       if ($request->ajax()) {
           return response(Niveau::create($request->all()));
       }
    }

////////////////////////////////////////////////////////////////////////


public function showLevel(Request $request)
{
      if ($request->ajax()) {
       return response(Niveau::where('id_matiere',$request->id_matiere)->get());
   }
}

////////////////////////////////////////////////////////////////////////

public function postInsertshift(Request $request)
    {
       if ($request->ajax()) {
           return response(Periode::create($request->all()));
       }
    }


////////////////////////////////////////////////////////////////////////

public function postInserttime(Request $request)
{
    if($request->ajax())
    {
        return response(Time::create($request->all()));
    }
}
////////////////////////////////////////////////////////////////////////


public function postInsertgroup(Request $request)
{
    if($request->ajax())
    {
        return response(Group::create($request->all()));
    }
}
}
