@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-black-500 mb-3 mt-10">Mes taches</h1>

@foreach ($tasks as $task )
<a href="{{ route('task.show',['task' => $task->id ]) }}">
<div class="px-2 py-5 shadow-sm hover:shadow-md rounded border border-gray-200">
    <h1 class="text-xl font-bold text-black-800"> {{ $task->name }}</h1>
    <p class="text-md text-gray-800"> {{ $task->description }}</p>
        <p class="mt-2">date de debut {{ $task->start_date }}</p>
        <p class="mt-2">date d'écheance {{ $task->due_date }}</p>
<span class="{{ $task->statusColor() }} text-white py-2 px-4 rounded">{{ $task->status }}</span>
<div class="flex-column">

       @if ($task->status== 'en cours')
    <form action="{{ route('task.maskAsTermined', ['task' => $task->id]) }}" method="post">
        @csrf
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">marque comme termine</button>
    </form>
    @endif


    @if ($task->isActive())
    <form action="{{ route('task.startTask', ['task' => $task->id]) }}" method="post">
        @csrf
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Commencer la tâche</button>
    </form>
    @endif

</div>
</div>
</a>
@endforeach

@endsection
