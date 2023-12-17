<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posztok</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            word-wrap: break-word;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
           
        }

        h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .post {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .post-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post-content {
            margin-bottom: 10px;
        }

        .post-info {
            font-size: 0.8rem;
            color: #555;
        }
        
        .like-form {
            margin-top: 10px;
        }

        .delete-button {
            background-color: red;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .details-button{
            color: #fff;
            text-decoration: none;
            padding: 10px;
            background-color: #3498db;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .details-button:hover{
            background-color: #2980b9;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        nav a {
            color: #333;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            background-color: #ddd;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #ccc;
        }
        
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 2px;
            text-align: center;
            z-index: 1000;
        }

        .no-posts-message {
        font-size: 1.2rem;
        text-align: center;
        color: #555;
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px; 
    }

    </style>
</head>
<body>
    <header>
        <h1><i>POST_R</i></h1>
        <nav>
            <a href="{{ route('posts.create') }}">Posztolás</a>
            <a href="{{ auth()->check() && auth()->user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard') }}">Dashboard</a>
        </nav>
    </header>
    <div class="container">
        <h2>{{ __('Posztok') }}</h2>

        @forelse ($posts as $post)
            <div class="post">
                <div class="post-title">{{ $post->title }}</div>
                <div class="post-content">{{ $post->content }}</div>
                <div class="post-info">
                    {{ __('Beküldés dátuma') }}: {{ $post->created_at }} | 
                    {{ __('Felhasználó') }}: {{ $post->user->name }}
                </div>
                <div>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}" ><button class="details-button">Részletek</button></a>
                @if (auth()->check() && auth()->user()->isAdmin())
                <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Törlés</button>
            </form>
            @endif
            </div>
            </div>
        @empty
        <p class="no-posts-message">{{ __('Nincsenek Posztok') }}</p>
        @endforelse
    </div>
</body>
</html>