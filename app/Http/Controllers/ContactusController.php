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
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'phone' => 'required|string|min:1|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
        ], [
            'required' => ":attribute không được bỏ trống.",
            'min' => ":attribute phải có ít nhất :min ký tự.",
            'max' => ":attribute phải có nhiều nhất :max ký tự.",
            'email' => ":attribute phải đúng định dạng email."
        ]);


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
