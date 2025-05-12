<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basic HTML5 Template</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @yield('head')
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            nav ul {
                list-style-type: none;
                padding: 0;
                background: #005bb5;
                overflow: hidden;
                display: flex;
                justify-content: center;
            }

            nav ul li {
                padding: 14px 20px;
            }

            nav ul li a {
                color: white;
                text-decoration: none;
            }

            .container {
                display: flex;
                flex: 1;
                max-width: 100%;
            }

            .sidebar {
                width: 250px;
                background: #f4f4f4;
                padding: 15px;
            }

            .main-content {
                flex: 1;
                padding: 20px;
            }

            footer {
                background: #004080;
                color: white;
                text-align: center;
                padding: 10px;
                position: relative;
                bottom: 0;
                width: 100%;
            }
        </style>
        @yield('styles')

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>






                @guest
                    @if (Route::has('login'))
                        <li>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest



            </ul>
        </nav>

        <div class="container">
            <aside class="sidebar">
                <h2>Sidebar</h2>
                <ul>
                    <li><a href="{{ URL('/student') }}">Students</a></li>
                    @can('teachers')
                        <li><a href="{{ URL('/teachers') }}">Teachers</a></li>
                    @endcan
                    <li><a href="{{ URL('/classes') }}">Class</a></li>
                </ul>

                <div class="userDetails">
                    <h3>Name : {{ Auth::user()->name }}</h3>
                    <h3>Type : {{ Auth::user()->user_type }} </h3>
                </div>


            </aside>
            <main class="main-content">


                @yield('content')




            </main>
        </div>

        <footer>
            <p>&copy; 2025 My Website. All rights reserved.</p>
        </footer>
    </body>

    <script>
        setTimeout(() => {
            window.Echo.channel('public-chat')
                .listen('AsignToClassEvent', (e) => {
                    console.log(e.message);
                });

            window.Echo.private('private-chat.{{ Auth::user()->id }}')
                .listen('AsignToClassEvent', (e) => {
                    console.log('private channel broadcast ', e.message);
                })
        }, 200);
    </script>
    @yield('scripts')

</html>
