<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::all(); //havent tested this query yet
        $tasks = Task::all();
        
        return inertia('projects' ,
    [
        'projects' => $projects,
        'tasks' => $tasks
    ]);

   
    }
}
