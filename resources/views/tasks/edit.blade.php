@extends('layouts.app')

@section('content')

<h1 class="text-3xl text-black-500 mb-3 mt-10">Editer la tache</h1>

<div class="bg-white shadow-lg px-4 py-6 rounded-md">
    <form method="POST" action="{{route('task.edit',['task' => $task->id])}}">
        @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-700 ">Titre de la tâche</label>
            <input type="text" value="{{ old('name') ?? $task->name }}" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
               @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 @enderror" placeholder="Titre de la tâche">
            @error('name')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}} </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="dateStart" class="block mb-2 text-sm font-medium text-gray-700">Date de début</label>
            <input type="date" value="{{ old('start_date') ?? $task->start_date }}" name="start_date" id="dateStart" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
            @error('start_date') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 @enderror">
            @error('start_date')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}} </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="dateEnd" class="block mb-2 text-sm font-medium text-gray-700">Date de fin</label>
            <input type="date" value="{{ old('due_date') ?? $task->due_date }}" name="due_date" id="dateEnd" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
            @error('due_date') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 @enderror">
            @error('due_date')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}} </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Votre message</label>
            <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500
             @error('description') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 @enderror" placeholder="Laissez un commentaire..."> {{ old('description') ?? $task->description }}</textarea>
            @error('description')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}} </p>
            @enderror
        </div>
        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Editer</button>
    </form>
</div>

@endsection
