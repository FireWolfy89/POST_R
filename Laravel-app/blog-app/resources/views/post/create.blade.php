<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post írás</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: lightgray;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: black;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <h1>Post írás</h1>

        <label for="title">Cím:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">Tartalom:</label>
        <textarea id="content" name="content" required></textarea>
        
        <button type="submit">Elküld</button>
    </form>

</body>
</html>