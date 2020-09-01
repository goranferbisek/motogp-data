@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Teams</h1>
    <p class="text-sm mb-8">Add a new racing team or edit an existing team</p>

    <div>
        @foreach ($teams as $team)
            <p class="mb-2">
                {{ $team->name }}
                <a href="admin/teams/edit/" class="text-blue-600">edit</a>
            </p>
        @endforeach
    </div>
@endsection