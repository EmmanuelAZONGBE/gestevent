<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\User;
use App\Models\Client;
use App\Models\Evenement;
use App\Notifications\NouvelleNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (organisateurPermission() == true || clientPermission() == true || prestatairePermission() == true || auth()->user()?->usertype == 1) {

            $lieux = Lieu::all();
            // dd($lieux);
            $evenement = Evenement::all();
            $clients = DB::table('users')->join('users', 'clients.user_id', '=', 'users.id', '=' ,'clients.user_id')->join('evenement','client.id', '=' ,'evenement.client_id');
            return view('frontend.page.index', compact('lieux','evenement','clients'));
        } else {
            return view('frontend.page.index');
        }
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
