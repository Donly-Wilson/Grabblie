<?php

namespace App\Http\Controllers;

use App\Models\Inspiration;
use Illuminate\Http\Request;

class InspirationController extends Controller
{
    //ADD image to inspiration database
    public function create(Request $request, $image_info)
    {
        $saveData = [
            "image_info" => $image_info,
            "image_url" => $request->image_url,
            "project_id" => 1
        ];

        $inspiration = Inspiration::create($saveData);
        return back();
    }

    //DELETE image from inspiration database
    public function destroy($image_info)
    {
        //Add's selected image ID within variable
        $inspiration = Inspiration::where('image_info', $image_info);
        //Delete image ID within variable
        $inspiration->delete();


        return back();
    }
}
