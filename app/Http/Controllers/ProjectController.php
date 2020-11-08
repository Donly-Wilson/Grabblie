<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function Index()
    {
        //Retrieve all data the Projects table
        $projects = Project::all();

        //pass down data to view
        return view('account/projects/index', compact('projects'));
    }

    public function create()
    {
        return view('account/projects/create');
    }

    public function store(Request $request)
    {
        $project = new Project();

        $project::create(
            $request->all()
        );

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
        $project = Project::where('id', $id)->get();

        return view('account/projects/edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        //Update project title 
        Project::where('id', $id)
            ->update(["title" => $request->title]);

        return back();
    }

    public function destroy($id)
    {
        //Find one project where 'id' is equal to same id from route
        Project::where('id', $id)->delete();

        return redirect('account/projects');
    }
}
