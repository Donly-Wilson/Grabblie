<?php

namespace App\Http\Controllers;

use App\Models\Inspiration;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class InspirationController extends Controller
{
    //ADD image to inspiration database
    public function create(Request $request, $image_info)
    {
        //Select active project for logged in user
        $project = Project::where('user_id', Auth::id())->where('active', 1)->first();

        if ($project == null) {
            return redirect('account/project/create');
        } else {
            $saveData = [
                "image_info" => $image_info, //(comes from url)
                "image_url" => $request->image_url,
                "project_id" => $project->id
            ];
            $inspiration = Inspiration::create($saveData);

            return back();
        }
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
