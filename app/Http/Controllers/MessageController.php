<?php
namespace App\Http\Controllers;

use App\Events\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send_message(Request $request)
    {
        // Récupérer les données du formulaire
        $lastName = $request->input('last_name');
        $firstName = $request->input('first_name');
        $message = $request->input('message');

        
        event(new Message($lastName, $firstName, $message));

             return view('admin\page\message\send_message');

    }
}
