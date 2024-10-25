@extends('layouts.app')

@section('content')

@if(session('error'))
    <div class="bg-red-100 border mt-2 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline"> {{session('error')}} </span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
@endif

<h1 class="text-3xl text-black-500 mb-3 mt-10">Attribuer une tache</h1>

<div class="bg-white shadow-lg px-4 py-6 rounded-md">

    <form method="POST" action="{{route('task.assign',['task' => $task->id])}}">
        @csrf
        <div class="mb-6">
            <h1 class="text-xl font-bold">{{$task->name}}</h1>
        </div>
        <div class="mb-6">
            <label for="user_assigned_to" class="block mb-2 text-sm font-medium text-gray-900">Utilisateurs</label>
            <select id="user_assigned_to" name="user_assigned_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Attribuer la tache</button>
    </form>
</div>
<br>
<a href="#" class="font-medium shadow-lg bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>

@endsection
