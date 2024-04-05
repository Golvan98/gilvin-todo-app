<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectUser;

class ProjectUserController extends Controller
{
  
    public function removeMember(Request $request)
    {
        $memberInfo = $request->validate([
            'member_id' => 'required',
            'project_id' => 'required'
        ]);


        $selectedProjectUser = ProjectUser::where('project_id', $memberInfo['project_id'])
        ->where('user_id', $memberInfo['member_id'])
        ->first();

        $selectedProjectUser->delete();

        return redirect()->intended('home')->with('success', 'Member Removed');
    }
}
