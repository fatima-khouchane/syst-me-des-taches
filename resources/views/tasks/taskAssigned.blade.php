@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-black-500 mb-3 mt-10">Mes taches</h1>

@foreach ($tasks as $task )
<div class="px-2 py-5 shadow-sm hover:shadow-md rounded border border-gray-200">
    <h1 class="text-xl font-bold text-black-800">Construire un framework</h1>
    <p class="text-md text-gray-800">Lorem ipsum, dolor sit amet consectetur adipisicing elit......</p>
    <p class="mt-2">Date d'échéance : 10/02/2023</p>
    <button class="bg-green-500 px-2 py-1 rounded-md text-white mt-3 font-bold" type="submit">Marquer comme terminée</button>
</div>
@endforeach

@endsection
