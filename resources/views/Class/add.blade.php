@extends('layouts.app_custom')

@section('head')
    <title>Create Class</title>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4 text-center">Create Class</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ URL('classes/create') }}">
                @csrf

                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Teacher</label>
                    <select class="form-select" name="teacher_id" id="teacher_id" required>
                        <option value="" disabled selected>Select a teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save Class</button>
                </div>
            </form>

        </div>
    </div>
@endsection
