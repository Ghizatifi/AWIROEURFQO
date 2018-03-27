<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }


    public function getMangeCouress()
    {


            return view('cours.gestionCours');

            }
}
