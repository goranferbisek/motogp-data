@extends('layout')

@section('content')
<main>
    <h1 class="text-xl text-red-600 text-center mb-6">Riders</h1>

    <div class="flex flex-wrap">
        @foreach ($riders as $rider)
            <div class="w-1/4 mx-4 pb-4">
                <div class="flex items-center justify-between">
                    <img
                        src="images/flags/{{$rider->country->icon ?: 'default-flag.svg' }}"
                        alt="{{ $rider->country->name }}"
                        class="h-4 mr-2"
                    >
                    <span>{{ $rider->first_name}} {{$rider->last_name}} {{$rider->racing_number}}</span>
                    <span>age: {{$rider->age }}</span>
                </div>
                <hr>
                <img
                    src="images/riders/{{ $rider->photo ?: 'default-photo.jpg' }}"
                    alt=""
                >
                <div>
                    Team: {{ $rider->team->name }}
                    Bike: {{ $rider->bike->make }}
                </div>
            </div>
        @endforeach
    </div>

</main>
@endsection