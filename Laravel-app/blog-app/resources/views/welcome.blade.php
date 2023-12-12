<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Blog Name</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .welcome-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa; /* Set your background color */
            color: #495057; /* Set your text color */
        }

        .welcome-heading {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .welcome-subheading {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .login-links {
            display: flex;
            gap: 1rem;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-heading">Welcome to Your Blog</div>
        <div class="welcome-subheading">Discover and share amazing stories</div>

        @if (Route::has('login'))
            <div class="login-links">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm text-gray-700">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>
</html>