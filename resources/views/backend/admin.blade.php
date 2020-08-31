@extends('layout')

@section('content')
<main>
    <nav>
        <ul>
            <li><a href="/admin/teams" class="mr-6">Teams</a></li>
            <li>Link 2</li>
            <li>Link 3</li>
            <li>Link 4</li>
            <li>Link 5</li>
        </ul>
        <hr class="border-red-600">

        @yield('admin.content')
    </nav>
</main>
@endsection