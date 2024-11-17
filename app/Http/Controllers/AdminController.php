<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function userTasks($user_id)
    {
        $tasks = Task::where('user_id', $user_id)->get();
        return view('dashboard.tasks')->with('tasks', $tasks);
    }


    
}
