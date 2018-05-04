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
class statistiqueController extends Controller
{
   public function getListEtudiant(){
     $program = Programm::all();
     $annees=Annee::orderBy('id_annee','DESC')->get();
     $niveau=niveau::all();
     $group=Group::all();
     return view('statistique.ListEtudiant',compact('program','annees','group','niveau'));
   }

   public function getEtudiantInfo(Request $request){
     $classes = $this->info()
     ->select(DB::raw('students.student_id,
       CONCAT(students.first_name," ",students.last_name)as name,(CASE WHEN students.sex=0 THEN "Male"  ELSE "Female" END)as sex ,students.dob,
         CONCAT(programs.program," / ",levels.level," / ",shifts.shift," / ",times.time," start- (",classes.start_date,"/",classes.end_date,")")as program'))
     ->where('classes.classe_id',$request->classe_id)
     ->get();
     return view('statistique.studentInfo');
   }
}
