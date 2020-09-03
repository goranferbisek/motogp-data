@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Teams</h1>
    <p class="text-sm mb-8">Add a new racing team or edit an existing team</p>

    <a href="/admin/teams/create" class="bg-red-600 text-white px-2 py-4">
        Create a new team
    </a>

    <div class="mt-8">
        @foreach ($teams as $team)
            <p class="mb-2">
                {{ $team->name }}
                <a href="admin/teams/edit/" class="text-blue-600">edit</a>
            </p>
        @endforeach
    </div>
@endsection