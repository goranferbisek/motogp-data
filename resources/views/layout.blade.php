<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="#">Racing seasons</a></li>
            <li><a href="#">Riders</a></li>
            <li><a href="/teams">Teams</a></li>
            <li><a href="#">Tracks</a></li>
        </ul>
    </nav>
</header>

@yield('content')

</body>
</html>