<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Request $request)
    {
      //  dd($request->all());
        // Dump and die to inspect the selectedProjectId

        $newTask = $request->validate([
            'name' => 'required',
            'status' => 'required', 
            'project_id' => 'required'
        ]);

        $createdTask = Task::create($newTask);

        return redirect()->intended('projects')->with('success', 'Task Created');
    
        // Assign selectedProjectId to the $newTask array
      
    }
}
