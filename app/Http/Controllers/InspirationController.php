<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspirationController extends Controller
{
    public function addimage(Request $request, $image_info)
    {
        $saveData = [
            "image_info" => $image_info,
            "image_url" => $request->image_url
        ];
        return $saveData;
    }
}
