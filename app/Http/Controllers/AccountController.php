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
        $projects = Project::where('user_id', Auth::id())->get();

        $projectsTotal = Project::all()->count();

        $projectsTitle = [];

        foreach ($projects as $project) {
            array_push($projectsTitle,  $project->title);
        }

        // return $projectsTitle;
        $test = ['hello', 'world', 'man'];
        return view('account/dashboard', compact('projectsTotal', 'projectsTitle', 'test'));
    }
}
