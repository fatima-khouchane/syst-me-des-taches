<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'suprimer avec success');
        } else {
            return redirect()->back()->with('erreur', 'utilisateur non trouver');
        }


    }

    public function edit(User $user)
    {
        $user->load('roles');//charger le role associe a cette utilisateur
        $roles = Role::all();
        return view('admin.users.edit', ["user" => $user, "roles" => $roles]);
    }


  
}
