
@extends('layouts.app')

@section('content')



@if(session('success'))
    <div class="bg-green-100 border mt-2 border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </span>
    </div>
@endif



<h1 class="text-3xl text-black-500 mb-3 mt-10">Taches Creer</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    name
                </th>
                <th scope="col" class="px-6 py-3">
                    content
                </th>
                  <th scope="col" class="px-6 py-3">
                    status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
           @foreach ($tasks as $task )
 <tr class="bg-white border-b white:bg-gray-900 ">
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">
{{ $task->name }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">
{{ $task->description }}
                </th>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium bg-blue-500 px-2 py2 text-white rounded-md hover:underline">{{ $task->status }}</a>
                </td>
                <td class="px-6 py-4">
                    @if($task->status !='en cours')
                    <a href="{{ route('task.assignedView',['task' => $task->id]) }}" class="font-medium bg-green-500 px-2 py2 text-white rounded-md hover:underline">Attribuer</a>

                    @endif
                    <a href="{{ route('task.remove',['task' => $task->id]) }}" class="font-medium bg-red-500 px-2 py2 text-white rounded-md  hover:underline">Remove</a>
                    <a href="{{ route('task.edit',['task' => $task->id]) }}" class="font-medium bg-blue-500 px-2 py2 text-white rounded-md hover:underline">Edit</a>
                    <a href="{{ route('task.show',['task' => $task->id]) }}" class="font-medium bg-yellow-500 px-2 py2 text-white rounded-md hover:underline">View</a>

                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
<br>
<a href="#" class="font-medium bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>

@endsection
