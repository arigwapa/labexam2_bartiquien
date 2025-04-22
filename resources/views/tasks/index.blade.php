@extends('layout.app')

@section('title', 'All Tasks')

@section('content')
<div class="container mx-auto mt-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Task List</h1>
        <a href="{{ route('tasks.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add Task</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->isEmpty())
        <p class="text-gray-600">No tasks available. Click “Add Task” to create your first one.</p>
    @else
        <table class="min-w-full bg-white border rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4">Title</th>
                    <th class="py-2 px-4">Description</th>
                    <th class="py-2 px-4">Completed</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="border-t">
                    <td class="py-2 px-4 {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                        {{ $task->title }}
                    </td>
                    <td class="py-2 px-4">{{ $task->description }}</td>
                    <td class="py-2 px-4">
                        <span class="{{ $task->is_completed ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                            {{ $task->is_completed ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

