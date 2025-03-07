@extends('layouts.app')
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
    </style>
@endsection


@section('content')
    <section>
        <h2>Students</h2>
        <form action={{ URL('student') }} method="GET">
            <div class="search">
                <input type="text" placeholder="Search" id="search" name="search">
                <button type="submit">Search</button>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
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
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->score }}</td>
                        <td>
                            <a href="#" class="editButton">Edit</a>
                            <a href="#" class="deleteButton">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection


@section('scripts')
    <script></script>
@endsection
