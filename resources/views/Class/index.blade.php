@extends('layouts.app_custom')
@section('head')
    <title>Classes</title>
@endsection

@section('styles')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #005bb5;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h2 {
            color: #005bb5;
            text-align: center;
        }

        .search {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search input {
            padding: 10px;
            width: 50%;
            margin-right: 10px;
        }

        .search button {
            padding: 10px;
            background-color: #005bb5;
            color: white;
            border: none;
        }

        .search button:hover {
            background-color: #004080;
        }

        .editButton {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .editButton:hover {
            background-color: #45a049;
        }

        .deleteButton {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .deleteButton:hover {
            background-color: #da190b;
        }

        .paginationDiv {
            text-align: center;
            margin-top: 20px;
        }

        .addStudentButton {
            background-color: #005bb5;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-left: 10px;
        }

        .addStudentButton:hover {
            background-color: #004080;
        }
    </style>
@endsection


@section('content')
    <h2>Classes List</h2>
    <a href="{{ URL('classes/add') }}" style="margin-bottom: 10px; display: inline-block;">Create New Class</a>

    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Teacher</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->teacher->name }}</td>
                    <td>{{ $class->description }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ URL('classes/assign-student', $class->id) }}">Assign Student</a>
                        <a class="btn btn-success" href="{{ URL('classes/edit', $class->id) }}">Edit</a>

                        <form action="{{ URL('classes/delete', $class->id) }}" method="post" style="display:inline;"
                            onsubmit="return confirm('Are you sure you want to delete this student')">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No classes found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection


@section('scripts')
    <script></script>
@endsection
