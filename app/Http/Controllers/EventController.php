<?php

namespace App\Http\Controllers;
use App\Events;
use Illuminate\Http\Request;
use Calendar;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
class EventController extends Controller
{

  // public function index(){
  //    $Eventss = Eventss::get();
  //    $Events_list = [];
  //    foreach ($Eventss as $key => $Events) {
  //      $Events_list[] = Calendar::Events(
  //              $Events->Events_name,
  //              true,
  //              new \DateTime($Events->start_date),
  //              new \DateTime($Events->end_date.' +1 day')
  //          );
  //    }
  //    $calendar_details = Calendar::addEventss($Events_list);
  //
  //      return view('Eventss.Eventss', compact('calendar_details') );
  //  }
  //
  //  public function addEvents(Request $request)
  //  {
  //      $validator = Validator::make($request->all(), [
  //          'Events_name' => 'required',
  //          'start_date' => 'required',
  //          'end_date' => 'required'
  //      ]);
  //
  //      if ($validator->fails()) {
  //        \Session::flash('warnning','Please enter the valid details');
  //          return Redirect::to('/Eventss')->withInput()->withErrors($validator);
  //      }
  //
  //      $Events = new Eventss;
  //      $Events->Events_name = $request['Events_name'];
  //      $Events->start_date = $request['start_date'];
  //      $Events->end_date = $request['end_date'];
  //      $Events->save();
  //
  //      \Session::flash('success','Events added successfully.');
  //      return Redirect::to('/Eventss');
  //  }




  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data = Events::get(['id', 'title', 'start', 'end', 'color']);

      return Response()->json($data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $Events = new Events();
      $Events->title = $request->title;
      $Events->start = $request->date_start . ' ' . $request->time_start;
      $Events->end = $request->date_end;
      $Events->color = $request->color;
      $Events->save();

      return redirect('/');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $Events = Events::find($id);
      $Events->title = $request->title;
      $Events->start = $request->date_start . ' ' . $request->time_start;
      $Events->end = $request->date_end;
      $Events->color = $request->color;

      if($Events->save())
          return response()->json([
              'status'    =>  201,
              'message'   =>  'Événements mis à jour avec succès'
          ]);
      return response()->json([
          'status'    =>  503,
          'message'   =>  'UNE ERREUR SURVENUE LORS DE LA MISE À JOUR'
      ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $Events = Events::find($id);
      if($Events == null)
          return Response()->json([
              'message'   =>  'ERREUR DANS ELIMINATION Evénements'
          ]);
      $Events->delete();
      return Response()->json([
          'message'   =>  'Événements ÉLIMINÉS AVEC SUCCÈS.'
      ]);

  }
}
