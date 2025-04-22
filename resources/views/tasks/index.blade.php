@extends('layout.app')

@section('title', 'All Tasks')

@section('content')
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="profile-card d-flex justify-content-center align-items-center">
            <img src="https://cdn-icons-png.flaticon.com/512/6783/6783643.png" alt="User Profile">
            <button class="mind-button btn " onclick="location.href='tasks/create';">
                Add task here
            </button>

        </div>
    </div>
    @foreach ($tasks as $task)
        <div class="container mt-3 d-flex justify-content-center align-items-center">
            <div class="profile-body d-flex justify-content-start align-items-center">
                <div class="mx-4 d-block justify-content-start align-items-center w-100">
                    <div class="d-flex align-items-center">
                        <div class="col mt-2 d-flex align-items-center mb-2">
                            <div class="form-check d-flex align-items-center gap-2">
                                <input class="form-check-input" type="checkbox" id="check-{{ $task->id }}"
                                    onclick="completeTask({{ $task->id }})">
                                <label class="form-check-label mb-0 mx-3" for="check-{{ $task->id }}">
                                    <h6 class="mb-0" id="title-{{ $task->id }}">{{ $task->title }}</h6>
                                </label>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('tasks.edit', $task->id) }}">Edit</a></li>
                                <li><a class="dropdown-item" href="{{ route('tasks.show', $task->id) }}">Show Task</a></li>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>
@endsection
