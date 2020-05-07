@extends('layout')

@section('content')
<main>
    <h1>Tracks</h1>

    <ul>
        @foreach ($tracks as $track)
            <li>{{
                $track->name .' | '. $track->length . ' metres'
            }}</li>
        @endforeach
    </ul>

</main>
@endsection