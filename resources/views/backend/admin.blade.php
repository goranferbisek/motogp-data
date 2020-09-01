@extends('layout')

@section('content')
<main class="flex">
    <nav class="w-1/6 border-r-2 border-red-600 mr-8">
        <h1 class="text-xl font-bold mb-2">Menu</h1>
        <ul>
            <li class="mb-2"><a href="/admin">Admin panel</a></li>
            <li class="mb-2"><a href="/admin/teams">Teams</a></li>
            <li class="mb-2"><a href="#">Riders</a></li>
            <li class="mb-2"><a href="#">Circuits</a></li>
        </ul>
    </nav>
    <div>
        @yield('admin.content', 'Welcome to the admin panel.')
    </div>
</main>
@endsection