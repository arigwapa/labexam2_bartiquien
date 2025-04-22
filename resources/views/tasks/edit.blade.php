@extends('layout.app')

@section('title', 'Edit Task')

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

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="create-post-card">
                    <h5 class="text-center mb-3">Edit Task</h5>

                    <div class="profile d-flex align-items-center mb-3">
                        <div class="mx-3">
                            <div class="fw-bold">Disney Princess</div>
                            <small class="text-muted"><i class="bi bi-people-fill"></i> Friends</small>
                        </div>
                    </div>

                    <input type="text" name="title" class="post-input" placeholder="Title" value="{{ $task->title }}"
                    required>
                    <textarea name="description" class="post-input" rows="3" placeholder="What's on your mind?">{{ $task->description }}</textarea>

                    <button type="submit" class="btn btn-primary post-btn mt-3">Update Task</button>
                </div>
            </div>
        </form>
    </div>
@endsection
