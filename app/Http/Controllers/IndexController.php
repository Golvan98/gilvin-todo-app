<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return inertia('homepage');
    }

    public function test()
    {
    return inertia('testpage');
    }


    public function fakehome()
    {
        return redirect()->route('projects');
    }

}
