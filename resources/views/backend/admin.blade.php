@extends('layout')

@section('content')
<main class="flex">
    <nav class="w-1/6 border-r-2 border-red-600 mr-8">
        <h1 class="text-xl font-bold mb-2">Menu</h1>
        <ul>
            <li class="mb-2"><a href="/admin">Home</a></li>
            <hr class="mb-2">
            <li class="mb-2"><a href="/admin/teams">Manage teams</a></li>
            <li class="mb-2"><a href="/admin/countries">Manage countries</a></li>
            <li class="mb-2"><a href="/admin/bikes">Manage bikes</a></li>
            <li class="mb-2"><a href="/admin/riders">Riders</a></li>
            <li class="mb-2"><a href="/admin/tracks">Tracks</a></li>
        </ul>
    </nav>
    <div>
        @yield('admin.content', 'Welcome to the admin panel.')
    </div>
</main>
@endsection