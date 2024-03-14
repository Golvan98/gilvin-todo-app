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
            'project_name' => 'required',
            'project_description' => 'required'
        ]);

        $newProject = Project::create($projectInfo);

       

      
    }
}
