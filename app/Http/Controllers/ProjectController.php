<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function Index()
    {
        //Retrieve all relative data for authenticated user's id
        $projects = Project::where('user_id', Auth::id())->get();

        //pass down data to view(in projects table)
        return view('account/projects/index', compact('projects'));
    }

    public function create()
    {
        return view('account/projects/create');
    }

    public function store(Request $request)
    {
        $project = new Project();

        $project::create([
            'title' => $request->title,
            'user_id' => Auth::id()
        ]);

        return redirect("account/projects");
    }

    public function show($id)
    {
        //Find one project where 'id' is equal to same id from route
        $project = Project::where('id', $id)->first();
        // return $project->inspirations;
        return view('account/projects/show', compact('project'));
    }


    public function edit($id)
    {
        //Find one project where 'id' is equal to same id from route
        $project = Project::where('id', $id)->first();

        return view('account/projects/edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        //Update project title if project id matches
        //& Right user is logged in(won't allow changes if it's wrong user)
        Project::where('id', $id)->where(
            'user_id',
            Auth::id()
        )->update(["title" => $request->title]);
        // return $id;
        return back();
    }

    public function destroy($id)
    {
        //Find one project where 'id' is equal to same id from route
        $project = Project::where('id', $id)->first();

        if ($project->user_id == Auth::id()) {
            //Delete Project and inspirations within it
            $project->deleteRelated();
            return redirect('account/projects');
        } else {
            return redirect('account/projects');
        }
    }
}
