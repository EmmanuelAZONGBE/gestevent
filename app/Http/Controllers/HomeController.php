<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class HomeController extends Controller
{
    //
    public function index()
    { 
        $lieux = Lieu::all();
        return view('frontend.page.index',compact('lieux'));
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
