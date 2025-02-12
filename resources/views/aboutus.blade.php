@extends('layouts.app')


@section('scripts')
    <script></script>
@endsection


@section('content')
    <section>
        <h2>About Us</h2>
        <p>This is a simple HTML and CSS template to start your project.</p>

        <p>Name : {{ $name }}</p>
        <p>ID: {{ $id }}</p>
    </section>
@endsection
