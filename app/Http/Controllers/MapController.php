<?php

namespace App\Http\Controllers;
use Mapper;

use Illuminate\Http\Request;

class MapController extends Controller
{
      public function index()
    {
      // Mapper::map(31.637679,-8.010225);
Mapper::map(31.637679,-8.010225, ['zoom' => 15,
 'markers' => ['title' => 'Eureka creation', 'animation' => 'DROP'],
 'clusters' => ['size' => 15, 'center' => true, 'zoom' => 20]]);

      return view('welcome');
    }
}
