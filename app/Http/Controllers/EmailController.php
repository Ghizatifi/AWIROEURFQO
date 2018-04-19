<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
class EmailController extends Controller
{
    ////////////////////////////////////
    public function getContact() {
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


  ////////////////////////////////////
  public function getContactB() {
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
