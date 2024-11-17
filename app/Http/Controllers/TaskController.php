<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            $userRole = Auth::user()->role;
            if ($userRole == 'admin') {
                return view('dashboard');
            }
            $tasks = Task::where('user_id', Auth::id())->get();
            return view('tasks.index')->with('tasks', $tasks);
        }
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->task;
        $task->priority = $request->priority;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->user_id = Auth::id();

        $task->save();
        return redirect()->route('tasks.index');
    }

    public function edit($task_id)
    {
        $task = Task::find($task_id);
        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $request, $task_id)
    {
        $task = Task::find($task_id);
        $task->title = $request->task;
        $task->priority = $request->priority;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function destroy($task_id)
    {
        $task = Task::find($task_id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
