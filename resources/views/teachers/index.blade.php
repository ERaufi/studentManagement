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
        <h2>Teachers</h2>
        <form action={{ URL('teachers') }} method="GET">
            <div class="search">
                <input type="text" placeholder="Search" id="search" name="search" value="{{ request('search') }}">
                <button type="submit">Search</button>
                <a class="addStudentButton" href="{{ URL('teachers/add') }}">Add Teacher</a>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>
                            @if (count($teacher->images) > 0)
                                <img src="{{ asset('storage/' . $teacher->images->first()->path) }}" width="150">
                            @endif
                        </td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>
                            <a href="{{ URL('teachers/edit', $teacher->id) }}" class="editButton">Edit</a>
                            <form action="{{ URL('teachers/delete', $teacher->id) }}" method="post" style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this Teacher')">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="paginationDiv">
            {{ $teachers->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection


@section('scripts')
    <script></script>
@endsection
