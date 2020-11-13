<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        #Adding " ->middleware('auth'); " to the end off this account route in " route/web.php " does the same
    }

    public function index(Request $request)
    {
        //Selects every project and count them
        $projectsTotal = Project::all()->count();

        //Select logged in user(ID) projects
        $projects = Project::where('user_id', Auth::id())->get();

        //Loop through projects and push title name into 'projectTitle'
        $projectsTitle = [];
        foreach ($projects as $project) {
            array_push($projectsTitle,  $project->title);
        }

        //Loop through projects and push unspiration sum into 'InspirationsTotal'
        $InspirationsTotal = [];
        foreach ($projects as $project) {
            array_push($InspirationsTotal,  $project->inspirations->count());
        }
        // return $InspirationsTotal;
        return view('account/dashboard', compact('projectsTotal', 'projectsTitle', 'InspirationsTotal'));
    }
}
