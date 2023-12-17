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
               <!-- Időjárásjelentés -->
               <h2>Időjárás</h2>
                <div id="weather"></div>
               
            </section>
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Mate Debreczeni's project</p>
        </footer>
    </div>
         <!-- OpenWeatherMap időjárás API CALL -->
    <script>

        const weatherApiKey ='9ceb67e07932edbf285bc2fb2b4ccc4f';

        //Hőmérséklet konvertálása
        function convertTemp(kelvin){
            const celsius = kelvin - 273.15;
            return {celsius};
        }

        //Időjárás lekérdezése
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=Budapest&appid=${weatherApiKey}`)
        .then(response => response.json())
        .then(data => {
            const temperatures = convertTemp(data.main.temp);
            const weatherDiv = document.getElementById('weather');
            weatherDiv.innerHTML = `
                    <p>Hőmérséklet: ${temperatures.celsius.toFixed(2)} °C</p>
                    <p>Időjárás: ${data.weather[0].description}</p>
                    <p>Város: ${data.name}</p>
                    `;
        });

    </script>
    
</body>
</html>