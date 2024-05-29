<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function create(Request $request)
    {
      //  dd($request->all());
        // Dump and die to inspect the selectedProjectId

        $newTask = $request->validate([
            'name' => 'required|min:4|max:20|',
            'status' => 'required', 
            'project_id' => 'required'
        ]);

        $createdTask = Task::create($newTask);

        return redirect()->back()->with('success', 'Task Created');
    
        // Assign selectedProjectId to the $newTask array
      
    }

    public function editTask(Request $request)
    {
        $editedTask = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'task_id' => 'required'
        ]);

        $targetTask = Task::find($editedTask['task_id']);
        $targetTask->update($editedTask);

        return redirect()->back()->with('success', 'Task Edited');
    }

    public function deleteTask(Request $request, $id)
    {
        $userdelete =  DB::table('tasks')->where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'task deleted');
    }
}
