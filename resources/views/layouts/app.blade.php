blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug & Project Tracker</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-blue-500 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="font-bold text-xl">Tracker App</a>
            <ul class="flex space-x-4">
                @if (Auth::check())
                    <li><a href="{{ route('bugs.index') }}" class="hover:text-blue-200">Bugs</a></li>
                    <li><a href="{{ route('projects.index') }}" class="hover:text-blue-200">Projects</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:text-blue-200">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:text-blue-200">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-blue-200">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>