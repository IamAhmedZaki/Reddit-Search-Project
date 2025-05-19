<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class Email2Controller extends Controller
{
    public function index(){
        return view('send-email');
    }


    public function sendEmail(Request $request){
        $request->validate([
            "to"=>"required|email",
            "subject"=>"required",
            "body"=>"required",
        ]);

        Mail::to($request->to)->send(new TestMail($request->subject,$request->body));

        return back()->with('success','email sent successfully');
    } 
}
