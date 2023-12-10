<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index() {
        return view("frontend.contact.contact");
    }
    public function create(Request $request){
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;
        $contact = new Contactus();
        $contact->name = $name;
        $contact->email = $email;
        $contact->phone = $phone;
        $contact->message = $message;
        $contact->save();
        return redirect()->back()->with('success', 'We will get back to you');
    }
}
