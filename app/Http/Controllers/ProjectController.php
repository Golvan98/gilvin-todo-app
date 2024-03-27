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
            'project_name' => 'required|min:4|max:20|unique:projects,project_name',
            'project_description' => 'required|min:4|max:30'
        ]);

        $newProject = Project::create($projectInfo);

        $userId = auth()->user()->id;

        $newProject->update(['ownerId' => $userId]);
       
       return back()->with('success', 'Project created successfully');

        
    }

    public function addMember(Request $request)
    {
        $newMember = $request->validate([
            'user_id' => 'required',
            'project_id'=> 'required'
        ]);
       $test =  ProjectUser::create($newMember);
       return redirect()->route('fakeHome');

    }

    public function editProject(Request $request)
    {
        dd('ello edit project here');
    }
}
