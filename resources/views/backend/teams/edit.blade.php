@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Edit this team</h1>

    <form method="POST" action="/admin/teams/{{ $team->id }}">
        @csrf
        @method('PUT')

        <label for="name">Team name:</label><br>
        <input type="text" name="name" id="name"
            class="border border-red-600"
            value="{{ $team->name }}"
        >
        <br>
        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
    <form action="">
        <input type="submit" value="Delete" class="mt-2 p-2 bg-red-600">
    </form>
@endsection