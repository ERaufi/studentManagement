@extends('layouts.app_custom')

@section('head')
    <title>Edit Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4 text-center">Edit Class</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ URL('classes/update', $class->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Teacher</label>
                    <select class="form-select" name="teacher_id" id="teacher_id" required>
                        <option value="" disabled>Select a teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $class->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $class->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="4" required>{{ $class->description }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Update Class</button>
                </div>
            </form>

        </div>
    </div>
@endsection
