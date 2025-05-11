@extends('layouts.app_custom')

@section('head')
    <title>Classes</title>
@endsection

@section('styles')
    <style>
        .assign-container {
            max-width: 600px;
            margin: 40px auto;
            background: #f9f9f9;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .assign-container h1,
        .assign-container h3 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="assign-container">
        <h1>Assign Students To Class (WebSocket Example)</h1>
        <h3>Class: <span class="text-primary">{{ $class->name }}</span></h3>

        <form method="POST" action="{{ url('classes/assign-student-class') }}">
            @csrf

            <div class="form-group">
                <label for="student_id">Select Student</label>
                <select name="student_id" id="student_id" class="form-control" required>
                    <option value="" disabled selected>-- Choose a student --</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="class_id" value="{{ $class->id }}">

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success px-4">Assign</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // Optional JS can go here
    </script>
@endsection
