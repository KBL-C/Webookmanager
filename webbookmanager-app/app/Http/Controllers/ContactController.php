<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use Validator;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function store(Request $request){

        $request->validate([
            'book'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'phone' =>'required',
            'direction' => 'required',
            'message'=>'required'

        ]);


        $email = new ContactMailable($request->all());

        Mail::to("kumar.baltar@itponiente.com")->send($email);

        return redirect()->route('contact.index')->with('message', 'Thanks for buying, your order will be sent soon');
    }

    /*
    public function selectBook($id){

        return view('contact.index', compact('id'));
    }
    */
}
