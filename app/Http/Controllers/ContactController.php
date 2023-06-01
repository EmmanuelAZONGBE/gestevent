<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.page.contact.index');
    }


    public function thankYou()
    {
        return view('admin.page.contact.thankyou');
    }
    public function sendEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];
       // dd($data);

        Mail::to($data['email'])->send(new ContactMail($data));

        return redirect()->route('contact.thankyou');
    }
}
