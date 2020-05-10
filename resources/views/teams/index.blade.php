@extends('layout')

@section('content')
<main>
    <h1 class="pb-6">Teams</h1>

    @foreach ($teams as $team)
        <h2 class="pt-6 pb-2 text-red-600">{{ $team->name }}</h2>

        <ul class="px-4">
            @foreach ($team->riders as $rider)
                <li>{{ $rider->first_name . ' ' . $rider->last_name }}</li>
            @endforeach
        </ul>
    @endforeach
</main>
@endsection