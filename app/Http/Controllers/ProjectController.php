<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\ProjectUser;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::all(); //havent tested this query yet
        $tasks = Task::all();
        $users = User::all();
        $projectUsers = ProjectUser::all();
        
       
    
        return inertia('projects' ,
    [
        'projects' => $projects,
        'tasks' => $tasks,
        'users' => $users,
        'projectUsers' => $projectUsers
    ]);

   
    }

    public function create(Request $request)
    {

        
        $projectInfo = $request->validate([
            'project_name' => 'required|min:4|max:20',
            'project_description' => 'required|min:4|max:30'
        ]);

        $newProject = Project::create($projectInfo);

        $userId = auth()->user()->id;

        $newProject->update(['ownerId' => $userId]);
        $newProject = Project::create($projectInfo);

        if ($newProject) {
            return redirect()->intended('projects')->with('success', 'Project created successfully');
        } else {
            // Handle the case where project creation fails
            return redirect()->back()->with('error', 'Failed to create project');
        }
        
    }

    public function addMember(Request $request)
    {

    }
}
