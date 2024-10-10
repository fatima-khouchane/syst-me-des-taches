<?php

namespace App\Http\Controllers;

use App\Http\Requests\taskRequest;
use App\Models\Task;
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
    public function create()
    {
        return view('tasks.create');
    }

    public function store(taskRequest $request)
    {
        // dd($request->all());


        Task::create([
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'due_date' => $request->input('due_date'),
            'description' => $request->input('description'),
            'user_created_by' => Auth::user()->id

        ]);
        return redirect()->route('task.index')->with('success', 'votre tache esr creer');
    }
    public function MysTask(
    ) {


        $tasks = Auth::user()->assigned;

        return view('tasks.taskAssigned', [
            'tasks' => $tasks
        ]);
    }


    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Task $task, taskRequest $request)
    {


        $task->update(
            $request->validated()
        );
        return redirect()->route('task.index')->with('success', 'votre tache est bien éditer');
    }

    public function remove(task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'votre tache est bien suprimmer');

    }
}
