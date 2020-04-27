@extends('layout')

@section('content')
<main>
    <h1>Teams</h1>

    @foreach ($teams as $team)
        <h2>{{ $team->name }}</h2>

        <ul>
            @foreach ($team->riders as $rider)
                <li>{{ $rider->first_name . ' ' . $rider->last_name }}</li>
            @endforeach
        </ul>
    @endforeach
</main>
@endsection