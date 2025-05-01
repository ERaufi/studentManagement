@extends('layouts.app_custom')
@section('head')
    <title>Students</title>
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
    <section>

        @if (session('success'))
            <div class="aleert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2>Students</h2>
        <form action={{ URL('student') }} method="GET">
            <div class="search">
                <input type="text" placeholder="Search" id="search" name="search" value="{{ request('search') }}">
                <button type="submit">Search</button>
                <a class="addStudentButton" href="{{ URL('student/add') }}">Add Student</a>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            @if (count($student->images) > 0)
                                <img src="{{ asset('storage/' . $student->images->first()->path) }}" width="150">
                            @endif
                        </td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->score }}</td>
                        <td>
                            @can('updateStudents', $student)
                                <a href="{{ URL('student/edit', $student->id) }}" class="editButton">Edit</a>
                            @endcan

                            @can('teachers')
                                <form action="{{ URL('student/delete', $student->id) }}" method="post" style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this student')">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endcan


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="paginationDiv">
            {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection


@section('scripts')
    <script></script>
@endsection
