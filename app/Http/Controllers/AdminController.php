<?php
namespace App\Http\Controllers;
use App\Models\Lieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
   public function welcome()
   {
    $lieux = Lieu::all();
    return view('frontend.layouts.welcome',compact('lieux'));
   }
 
}

