<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with('tasks')->get(); //havent tested this query yet
        dd($projects);
        
        return inertia('projects' ,
    [
        'projects' => $projects
    ]);

   
    }
}
