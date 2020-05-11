@extends('layout')

@section('content')
<main>
    <h1>Riders</h1>

    <ul>
        @foreach ($riders as $rider)
            <li>{{
                $rider->racing_number .' | '.
                $rider->first_name .' '.
                $rider->last_name .' | '.
                "Team: " . $rider->team->name
            }}</li>
        @endforeach
    </ul>

</main>
@endsection