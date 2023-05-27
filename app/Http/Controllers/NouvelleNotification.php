<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NouvelleNotification extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->notifications;

        // Manipuler les notifications ici

        return view('admin.page.notifications.index', compact('notifications'));
    }
}
