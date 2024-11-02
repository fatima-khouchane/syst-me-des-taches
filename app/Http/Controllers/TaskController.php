<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\taskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class TaskController extends Controller
{
    // récupère les tâches créées par l'utilisateur actuellement connecté
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
    // Affiche les tâches assignées à l'utilisateur connecté.
    public function MysTask(
    ) {


        $tasks = Auth::user()->assigned;

        return view('tasks.taskAssigned', [
            'tasks' => $tasks
        ]);
    }

    // Affiche le formulaire pour modifier une tâche existante.
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }
    // Met à jour une tâche existante avec les nouvelles données du formulaire.
    public function update(Task $task, taskRequest $request)
    {


        $task->update(
            $request->validated()
        );
        return redirect()->route('task.index')->with('success', 'votre tache est bien éditer');
    }
    // Supprime une tâche de la base de données.
    public function remove(task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'votre tache est bien suprimmer');

    }

    // Objectif : Cette ligne de code récupère tous les utilisateurs qui ne possèdent pas les rôles d'admin ou de create.
    // afficher une page où l'on peut assigner une tâche.
// La page affichera un formulaire où tu pourras choisir un utilisateur qui peut être assigné à cette tâche.
// Une fois que l'utilisateur est sélectionné et que tu soumets le formulaire, cette tâche sera assignée à cet utilisateur.
    public function assignedView(Task $task)
    {
        $users = User::whereDoesntHave('roles', function (Builder $query) {
            $query->whereIn('name', ['admin', 'create']);
        })->get();
        // dd($users);
        return view('tasks.assigned-view', compact('users', 'task'));
    }


    //  Assigne une tâche à un utilisateur si ce dernier n'est pas occupé.
    public function assigne(Request $request, Task $task)
    {
        $request->validate([
            'user_assigned_to' => ['required', 'exists:users,id']
        ]);
        // Cette ligne récupère l'ID de l'utilisateur à qui la tâche doit être assignée
        $user_assigned_to = $request->input('user_assigned_to');
        $user = User::findOrFail($user_assigned_to);
        // Vérifie si l'utilisateur est occupé
        $occuped = $user->assigned()
            ->where(function (Builder $query) use ($task) {

                // On vérifie si l'utilisateur est déjà occupé avec une autre tâche "en cours" ou "en attente"
                // et si les dates de la nouvelle tâche chevauchent celles des tâches existantes.
                $query->where(function ($sub) {
                    $sub->where('status', 'en cours')
                        ->orWhere('status', 'en attente');
                })
                    ->where('start_date', '<=', $task->due_date)
                    ->where('due_date', '>=', $task->start_date);

            })->exists();


        // return true ==>utilisateur est occupé
        // dd($occuped);
        if ($occuped) {
            return redirect()->route('task.assignedView', ['task' => $task->id])->with('error', "l'utilisateur $user->name est occupé poue cette période");

        }

        $task->user_assigned_to = $user_assigned_to;
        $task->status = 'en attente';
        $task->save();
        return redirect()->route('task.index')->with('success', "la taches a été bien attribue a $user->name");


        // Logique supplémentaire ici si l'utilisateur n'est pas occupé
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }



    public function maskAsTermined(Task $task)
    {
        $task->status = 'terminer';
        $task->save();
        return redirect()->route(route: 'task.MysTask');

    }

    public function startTask(Task $task)
    {
        $task->status = 'en cours';
        $task->save();
        return redirect()->route('task.MysTask');

    }
}
