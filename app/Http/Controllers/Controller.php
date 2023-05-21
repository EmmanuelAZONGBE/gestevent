<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function uploads(Request $request, $file_name)
    {
        $file = $request->$file_name;
        if ($file == null)  return null;
        $extension = $file->getClientOriginalExtension();
        $original_name = $file->getClientOriginalName();
        $size = $file->getSize();
        $type = $file->getClientOriginalExtension();

        $name = $file->storeAs('uploads', $file_name . time() . '.' . $extension, 'public');

        return $name;
    }


}
