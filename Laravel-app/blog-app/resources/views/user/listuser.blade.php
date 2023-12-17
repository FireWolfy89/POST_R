<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználók Listája</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightgray;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
           
        }

        .action-buttons button {
            padding: 8px;
            cursor: pointer;
        }

        .action-buttons button.delete {
            background-color: #ff5b5b;
            color: #fff;
        }

        .action-buttons button.update {
            background-color: #5bc0de;
            color: #fff;
        }
        .dashboard{
            padding: 8px;
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
            background-color: black;
            color: white;
            border-radius: 5px;
        }

       
    </style>
</head>
<body>
    <h2>Felhasználók Listája</h2>
    <header>
        <nav>
            <a href="{{ auth()->check() && auth()->user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard') }}">Vissza a Dashboardra</a>
        </nav>
    </header>
    
    <table>
        <thead>
            <tr>
                <th>Név</th>
                <th>Email</th>
                <th>Státusz</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td class="action-buttons">
                        <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Törlés</button>
                        </form>
                        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="status" value="{{ $user->status === 'active' ? 'inactive' : 'active' }}">
                            <button type="submit" class="update">Tilt/Felold</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('export.users') }}" class="export-button">
    <button type="button">Export Users</button>
</a>
</body>
</html>