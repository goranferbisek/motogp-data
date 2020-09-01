@extends('backend.admin')

@section('admin.content')
    <h1>Teams</h1>
    <p>Add a new racing team or edit an existing team</p>

    <div>
        @foreach ($teams as $team)
            <p>
                {{ $team->name }}
            </p>
        @endforeach
    </div>
@endsection