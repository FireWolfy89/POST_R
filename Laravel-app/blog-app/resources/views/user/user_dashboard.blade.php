<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightgray;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
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

        main {
            flex-grow: 1;
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <header>
            <h1>Üdv a POST_R-en!</h1>
            <nav>
            <a href="{{ route('posts.index') }}">Posztok listázása</a>
                <a href="{{ route('posts.create') }}">Posztolás</a>
                <a href="{{ route('dashboard') }}">Profil</a>
            </nav>
        </header>

        <main>
            <section>
               
               
            </section>
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Mate Debreczeni's project</p>
        </footer>
    </div>

    
</body>
</html>