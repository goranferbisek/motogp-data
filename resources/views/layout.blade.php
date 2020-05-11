<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>{{ config('app.name') }}</title>
</head>
<body class="container mx-auto py-4">
<header class="flex justify-between items-center mb-6">
    <div class="logo">
        <a href="/"><span class="text-red-600">MotoGP</span> data</a>
    </div>
    <nav>
        <ul class="flex">
            <li><a href="/" class="mr-6">Home</a></li>
            <li><a href="#" class="mr-6">Racing seasons</a></li>
            <li><a href="riders" class="mr-6">Riders</a></li>
            <li><a href="/teams" class="mr-6">Teams</a></li>
            <li><a href="/tracks" class="mr-6">Tracks</a></li>
        </ul>
    </nav>
</header>

@yield('content')

</body>
</html>