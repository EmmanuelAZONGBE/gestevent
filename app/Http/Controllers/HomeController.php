<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lieu;
use App\Models\User;
use App\Models\Evenement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class HomeController extends Controller
{
    //
    public function index()
    {
        $lieux = Lieu::all();
        $evenement = Evenement::all();
        $client = Client::all();
        return view('frontend.page.index',compact('lieux','evenement','client'));
    }
    public function redirect()
    {
            return view('admin.page.index');
    }

    public function welcome()
    {
     return view('frontend.layouts.welcome');
    }
}
