<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Team;
use App\Models\Batch;
use App\Models\projects;


class AdminController extends Controller
{
    public function add_role()
    {
        return view('admin.add_role');
    }
    public function store_role(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'role_name' => 'required|string|max:255',
        ]);

        $role = role::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully',
            'role' => $role
        ]);
    }
    public function add_team()
    {
        return view('admin.add_team');
    }
    public function store_team(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'team_id'=>'required',
            'team_name' => 'required|string|max:255',
        ]);

        $team = team::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Team created successfully',
            'team' => $team
        ]);
    }

    public function add_batch()
    {
        return view('admin.add_batch');
    }
    public function store_batch(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'batch_id'=>'required',
            'batch_name' => 'required|string|max:255',
        ]);

        $batch = batch::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Batch created successfully',
            'batch' => $batch
        ]);
    }


    public function getbatch(){
        $batches=Batch::all();
        return response()->json([
            'success' => 200,
            'batches' => $batches
        ]);
    }

    public function add_project()
    {
        return view('admin.add_project');
    }
    public function store_project(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title'=>'required',
            'source' => 'required|url|max:255',
            'description' => 'required|string|max:255',

        ]);

        $projects = projects::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'project created successfully',
            'projects' => $projects
        ]);
    }


    public function getproject(){
        $projects=projects::all();
        return response()->json([
            'success' => 200,
            'projects' => $projects
        ]);
    }
    public function all_project()
    {
        return view('admin.all_projects');
    }
    

}
