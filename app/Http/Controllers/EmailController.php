<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Mapper;

class EmailController extends Controller
{
    ////////////////////////////////////
    public function getContact() {
      // Mapper::map(31.637679,-8.010225, ['zoom' => 15,
      //  'markers' => ['title' => 'Eureka creation', 'animation' => 'DROP'],
      //  'clusters' => ['size' => 15, 'center' => true, 'zoom' => 20]]);
		return view('email.contact');
	}

    ///////////////////////////////////
    public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);
		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);
		Mail::send('emailInfos.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('ghizlan.aifi@gmail.com');
			$message->subject($data['subject']);
		});
		Session::flash('success', 'Your Email was Sent!');
		return redirect('/gestion/eleveList');
	}



  public function index()
{
  // Mapper::map(31.637679,-8.010225);
Mapper::map(31.637679,-8.010225, ['zoom' => 15,
'markers' => ['title' => 'Eureka creation', 'animation' => 'DROP'],
'clusters' => ['size' => 15, 'center' => true, 'zoom' => 20]]);

  return view('welcome');
}



  ////////////////////////////////////
  public function getContactB() {
    Mapper::map(31.517564,-8.061250, ['zoom' => 15,
    'markers' => ['title' => 'Eureka creation', 'animation' => 'DROP'],
    'clusters' => ['size' => 15, 'center' => true, 'zoom' => 20]]);
  return view('FrontEnd.contact');
}

  ///////////////////////////////////
  public function postContactB(Request $request) {
  $this->validate($request, [
    'name' => 'min:3',
    'email' => 'min:3',
    'subject' => 'min:3',
    'message' => 'min:4']);
  $data = array(
    'name' => $request->name,
    'email' => $request->email,
    'subject' => $request->subject,
    'bodyMessage' => $request->message
    );
  Mail::send('emailInfos.contact', $data, function($message) use ($data){
    $message->from($data['name']);
    $message->from($data['email']);
    $message->to('ghizlan.aifi@gmail.com');
    $message->subject($data['subject']);
  });
  Session::flash('success', 'Your Email was Sent!');
  return redirect('/index');
}
}
