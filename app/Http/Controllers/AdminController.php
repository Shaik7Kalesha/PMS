<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Team;
use App\Models\Batch;
use App\Models\Project;
use App\Models\Faculty;
use App\Models\Member;
use App\Models\Student;



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


    public function getrole()
    {
        $roles = Role::all();
        return response()->json([
            'success' => 200,
            'roles' => $roles
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
            // 'team_id' => 'required',
            'team_name' => 'required|string|max:255',
        ]);

        $team = team::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Team created successfully',
            'team' => $team
        ]);
    }
    public function getProject($id)
    {
        $project = Project::findOrFail($id);
        return response()->json(['project' => $project]);
    }


    public function getteam()
    {
        $teams = Team::all();
        return response()->json([
            'success' => 200,
            'teams' => $teams
        ]);
    }


    public function add_faculty()
    {
        return view('admin.add_faculty');
    }
    public function store_faculty(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'staffid' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'mobilenumber' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $faculty = faculty::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Faculty added successfully',
            'faculty' => $faculty
        ]);
    }



    public function getfaculty()
    {
        $faculties = Faculty::all();
        return response()->json([
            'success' => 200,
            'faculties' => $faculties
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
            'batch_id' => 'required',
            'batch_name' => 'required|string|max:255',
        ]);

        $batch = batch::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Batch created successfully',
            'batch' => $batch
        ]);
    }


    public function getbatch()
    {
        $batches = Batch::all();
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
            'title' => 'required',
            'source' => 'required|url|max:255',
            'description' => 'required|string|max:1000',

        ]);

        $projects = Project::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'project created successfully',
            'projects' => $projects
        ]);
    }


    public function getprojects()
    {
        $projects = Project::all();
        return response()->json([
            'success' => 200,
            'projects' => $projects
        ]);
    }
    public function all_project()
    {
        return view('admin.all_projects');
    }


    public function edit_project($id)
    {
        $project = Project::find($id);
        if ($project) {
            return response()->json([
                'status' => 200,
                'project' => $project,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Project Found.',
            ]);
        }

    }

    public function updateproject(Request $request, $id)
    {
        // Validate the incoming request data as needed
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'batch_year' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            'developers' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Find the project by ID
        $project = Project::find($id);

        if ($project) {
            // Log the incoming data for debugging
            \Log::info('Updating project:', $request->all());

            // Update project data
            $project->title = $request->title;
            $project->batch_year = $request->batch_year;
            $project->team = $request->team;
            $project->developers = $request->developers;
            $project->platform = $request->platform;
            $project->student_name = $request->student_name;
            $project->description = $request->description;

            // Save the updated project data
            $project->save();

            // Return success response
            return response()->json(['status' => 'success', 'message' => 'Project data updated successfully']);
        } else {
            // Return error response if project is not found
            return response()->json(['status' => 'error', 'message' => 'Project not found'], 404);
        }
    }


    public function updateBatchStatus(Request $request)
    {
        $batch = Batch::where('batch_id', $request->input('batchid'))->first();

        if ($batch) {
            $batch->status = $request->input('status');
            $batch->save();

            return response()->json([
                'message' => 'Batch status updated successfully'
            ], 200);
        }

        return response()->json([
            'message' => 'Batch not found'
        ], 404);
    }


    //get batches
    public function getBatches()
    {
        $batches = Batch::all(); // Adjust this based on your Batch model and database structure
        return response()->json(['batches' => $batches]);
    }

    //get member
    public function getMembers()
    {
        $members = Member::all(); // Adjust this based on your Batch model and database structure
        return response()->json(['members' => $members]);
    }

    //get team
    public function getTeams()
    {
        $teams = Team::all(); // Adjust this based on your Batch model and database structure
        return response()->json(['teams' => $teams]);
    }


    //get stduent
    public function getStudents()
    {
        $students = Student::all();
        return response()->json(['students' => $students]);

    }

    public function acceptProject($id)
    {
        // Logic to accept the project
        $project = Project::find($id);
        if ($project) {
            $project->status = 'Accepted';
            $project->save();
    
            return response()->json(['message' => 'Project accepted successfully']);
        }
        return response()->json(['message' => 'Project not found'], 404);
    }
    
    public function rejectProject($id)
    {
        // Logic to reject the project
        $project = Project::find($id);
        if ($project) {
            $project->status = 'Rejected';
            $project->save();
    
            return response()->json(['message' => 'Project rejected successfully']);
        }
        return response()->json(['message' => 'Project not found'], 404);
    }


    public function getProjectcount()
    {
        $getprojectscount = Project::count();
        return response()->json(['count' => $getprojectscount]);
        // return view('admin.adminhome',compact('getprojects'));
    }

    public function getMemberscount()
    {
        $getmemberscount = Member::count();
        return response()->json(['count' => $getmemberscount]);
    }


    public function grtstudentscount()
    {
        $getstudentscount = Student::count();
        return response()->json(['count' => $getstudentscount]);
    }

    public function getBatchesCount()
    {
        // Assuming 'batch_id' is the unique identifier for a batch
        $getBatchesCount = Batch::distinct('batch_id')->count('batch_id');
        return response()->json(['count' => $getBatchesCount]);
    }


    public function getteamcount()
    {
        $getteamcount = Team::count();
        return response()->json(['count' => $getteamcount]);
    }

}


