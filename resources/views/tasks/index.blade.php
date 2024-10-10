
@extends('layouts.app')

@section('content')

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
                    <a href="#" class="font-medium bg-green-500 px-2 py2 text-white rounded-md hover:underline">Attribuer</a>
                    <a href="{{ route('task.remove',['task' => $task->id]) }}" class="font-medium bg-red-500 px-2 py2 text-white rounded-md  hover:underline">Remove</a>
                    <a href="{{ route('task.edit',['task' => $task->id]) }}" class="font-medium bg-blue-500 px-2 py2 text-white rounded-md hover:underline">Edit</a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
<br>
<a href="#" class="font-medium bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>

@endsection
