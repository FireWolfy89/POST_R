<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poszt Részletei</title>
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
            color: #333;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }

        a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            background-color: #3498db;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #2980b9;
        }

        .comments {
            margin-top: 20px;
        }

        h3 {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .comment-form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .comment {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #eee;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>
            Beküldés dátuma: {{ $post->created_at }} |
            Felhasználó: {{ $post->user->name }}
        </p>
        <a href="{{ route('posts.index') }}">Vissza a posztokhoz</a>

        <!-- Kommentek megjelenítése -->
        <div class="comments">
            <h3>Kommentek</h3>
            @forelse ($post->comments as $comment)
                <div class="comment">
                    <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                </div>
            @empty
                <p>Nincsenek kommentek.</p>
            @endforelse
        </div>

        <!-- Hozzászólás űrlap -->
        <div class="comment-form">
            <h3>Hozzászólás hozzáadása</h3>
            <form method="POST" action="{{ route('comments.store', ['post' => $post]) }}">
                @csrf
                <label for="content">Hozzászólás:</label>
                <textarea id="content" name="content" required></textarea>
                <button type="submit">Hozzászólás</button>
            </form>
        </div>
    </div>
</body>

</html>