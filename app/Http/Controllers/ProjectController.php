<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\ProjectUser;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {

     //   $projects = Project::all(); //havent tested this query yet
        $tasks = Task::all();
        $users = User::all();
        $projectUsers = ProjectUser::all();

        $currentUserId = auth()->user()->id;

       

        //$projectsOfUser = all projectusers where user_id = aut()->id->pluck('project_id');

        $projectsOfUser = ProjectUser::where('user_id' , $currentUserId)->pluck('project_id')->unique();
        $projects = Project::whereIn('id', $projectsOfUser)->get();

        //    dd($allProjectsOfCurrentUser);
    
        // AllProjects = Projects::where('id', == $projectsofUser)



      //  $authId = auth()->user()->id; alternative to pass as prop to get currently authenticated user
      
        
       
    
        return inertia('projects' ,
    [
        'projects' => $projects,
        'tasks' => $tasks,
        'users' => $users,
        'projectUsers' => $projectUsers,
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

        $testprojectuser = ProjectUser::create([
            'project_id' => $newProject->id,
            'user_id' => $userId
        ]);
       
      return back()->with('success', 'Project created successfully');

        
    }

    public function addMember(Request $request)
    {
        $newMember = $request->validate([
            'user_id' => 'required',
            'project_id'=> 'required',
        ]);
       $test =  ProjectUser::create($newMember);
       return redirect()->route('fakeHome');

    }

    public function editProject(Request $request)
    {
       

        $editRequest = $request->validate([
            'project_name' => 'required|min:2|max:24',
            'project_description' => 'required|min:2|max:24',
            'project_id' => 'required'
        ]);

        $targetProject = Project::find($editRequest['project_id']);
        $targetProject->update($editRequest);
        return redirect()->intended('home')->with('success' , 'project edited');
    }


    public function deleteProject(Request $request, $id)
    {

        $userdelete =  DB::table('projects')->where('id', $id)->delete();
        

        return redirect()->intended('home')->with('success', 'project deleted');

    }
}
