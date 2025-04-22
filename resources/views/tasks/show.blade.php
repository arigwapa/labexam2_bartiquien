@extends('layout.app')

@section('title', 'Create Task')

@section('content')
    <div class="container mx-auto mt-6">

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" ">
            @csrf
            <div class="container mt-3 d-flex justify-content-center align-items-center">
            <div class="profile-body d-flex justify-content-start align-items-center mt-5">
                <div class="mx-4 d-block justify-content-start align-items-center w-100">
                    <div class="d-flex align-items-center mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/6783/6783643.png" alt="User Profile">
                        <div class="col mt-2">
                            <h5>Show Task</h5>
                        </div>
                        <div class="dropdown">
                            <a class="btn " href="{{ route('tasks.index') }}">
                                <i class="bi bi-x"></i>
                            </a>
                            <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('tasks.edit', $tasks->id) }}">Edit</a>
                                </li>
                                <form action="{{ route('tasks.destroy', $tasks->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                </form>
                            </ul>
                        </div>
                    </div>
                    <p class="mt-3"><strong>{{ $tasks->title }}</strong></p>
                    <p class="mt-3">{{ $tasks->description }}</p>
                </div>

            </div>
        </div>

                                
@endsection
