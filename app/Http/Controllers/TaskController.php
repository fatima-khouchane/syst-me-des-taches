<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->created_task;

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function MysTask()
    {


        $tasks = Auth::user()->assigned;

        return view('tasks.taskAssigned', [
            'tasks' => $tasks
        ]);
    }
}
