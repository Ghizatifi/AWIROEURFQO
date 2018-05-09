<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annee;
use App\Programm;
use App\Niveau;
use App\Periode;
use App\Time;
use App\Group;
use DB;
use App\Classe;
class ProgrammController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }

    public function getMangeCouress(Request $request)
    {
        $program = Programm::all();
        $annees=Annee::orderBy('id_annee','DESC')->get();
         $niveau=niveau::all();
      //   $pr=$request->id_programm;
      // $niveau = DB::table('niveaux')
      //            ->select('niveaux.*')
      //            ->where('niveaux.id_programm','=',$pr)
      //            ->get();
        $groups=Group::orderBy('id_niveau','DESC')->get();
        return view('programm.gestionProgramm',compact('program','annees','groups','niveau'));


            }

        ////////////////////////////////////////////////////////////////////////
public function postInsertYear(Request $request)
{
   if ($request->ajax()) {
       return response(Annee::create($request->all()));
   }
}

////////////////////////////////////////////////////////////////////////
public function postInsertMat(Request $request)
{
   if ($request->ajax()) {
       return response(Matiere::create($request->all()));
   }
}
////////////////////////////////////////////////////////////////////////
public function postInsertProgram(Request $request)
    {
       if ($request->ajax()) {
           return response(Programm::create($request->all()));
       }
    }
////////////////////////////////////////////////////////////////////////
    public function postInsertLevel(Request $request)
    {
       if ($request->ajax()) {
           return response(Niveau::create($request->all()));
       }
    }



public function showLevel(Request $request)
{
      if ($request->ajax()) {
       return response(Niveau::where('id_programm',$request->id_programm)->get());
   }
}

////////////////////////////////////////////////////////////////////////


public function showGroup(Request $request)
{
    if($request->ajax())
    {
        return response(Group::where('id_niveau',$request->id_niveau)->get());
    }
}


public function postInsertgroup(Request $request)
{
   if ($request->ajax()) {
       return response(Group::create($request->all()));
   }
}

////////////////////////////////////////////////////////////////////////

public function createclasses(Request $request)
{
    if($request->ajax())
    {
        return response(Classe::create($request->all()));
    }
}



     public  function  viewClasses(){
         $classes = DB::table('classes')
              ->join('annees','annees.id_annee','=','classes.id_annee')
              ->join('groups','groups.id_group','=','classes.id_group')
               ->join('niveaux','niveaux.id_niveau','=','classes.id_niveau')
                //->join('programms','programms.id_programm','=','niveaux.id_programm')
                ->join('programms','programms.id_programm','=','classes.id_programm')
                ->orderBy('annees.id_annee','DESC')
                  ->orderBy('niveaux.id_niveau','ASC')
                    ->get();
             $ar=Array('classes'=>$classes);
         return view('classes.classeInfo',$ar);
     }

     public function deletClass(Request $request)
     {

         if ($request->ajax()) {
             Classe::destroy($request->id_classe);
         }
     }

     public function editeClass(Request $request){

         if ($request->ajax()) {

                 return response(Classe::find($request->id_classe));
                         }
     }


     public function updateClass(Request $request){

         if ($request->ajax()) {

          return response(Classe::updateOrCreate(['id_classe'=>$request->id_classe],$request->all()));
          }
     }

























     ///////////////////////////////////////////








     public function  classInformation($filter)
     {
        return Classe::
         join('annees','annees.id_annee','=','classes.id_annee')
        ->join('groups','groups.id_group','=','classes.id_group')
         ->join('niveaux','niveaux.id_niveau','=','classes.id_niveau')
          ->join('programms','programms.id_programm','=','niveaux.id_programm')
          ->where($filter)
          ->orderBy('classes.id_classe','DESC');

     }

     public function showClassInformation(Request $request){
           if ($request->id_annee!="" && $request->id_programm=="")
           {
                  $filter = ['annees.id_annee'=>$request->id_annee];
           }
            if (
                $request->id_annee!="" &&
                 $request->id_programm!="" &&
                 $request->id_niveau!="" &&
                $request->id_group!=""
               )
             {
               $filter = [
               'annees.id_annee'=>$request->id_annee,
                'programms.id_programm'=>$request->id_programm,
                 'niveaux.id_niveau'=>$request->id_niveau,
                  'groups.id_group'=>$request->id_group];
                    }
              $classes = $this->classInformation($filter)->get();
     dump($classes);
              return view('classes.classeInfo',compact('classes'));

          }
}
