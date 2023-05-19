<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('frontend.page.index');
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
