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
                                <div class="d-flex justify-content-center align-items-center vh-100">
                                    <div class="card" style="width: 30rem; padding: 12px; ">
                                        <div class="card-body">
                                            <h3 class="card-title mb-4 mt-4">TASK DESCRIPTION</h3>

                                            <div class="form-floating mb-3 mt-2">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="">
                                                <label for="floatingInput">Title</label>
                                            </div>

                                            <div class="form-floating mb-4">
                                                <textarea class="form-control" placeholder="What is this task all about?" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Description</label>
                                            </div>

                                            <a href="#" class="btn btn-outline-secondary form-control">Back</a>
                                        </div>
                                     </div>
                                </div>
                            </form>
                        </div>
@endsection
