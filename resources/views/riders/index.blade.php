@extends('layout')

@section('content')
<main>
    <h1 class="text-xl text-red-600 text-center mb-6">Riders</h1>
    <div class="grid xl:grid-cols-3 lg:grid-cols-2 gap-4">
        @foreach ($riders as $rider)
            <div class="flex">
                <div class="w-1/3 mr-2">
                    <img
                        src="images/riders/{{ $rider->photo ?: 'default-photo.jpg' }}"
                        alt="{{ $rider->first_name}} {{$rider->last_name}} {{$rider->racing_number}}"
                    >
                </div>
                <div class="w-2/3 text-right">
                    <img
                        src="images/flags/{{$rider->country->icon ?: 'default-flag.svg' }}"
                        alt="{{ $rider->country->name }}"
                        class="h-6 mb-2 ml-auto"
                    >
                    <span class="text-2xl">
                        {{ $rider->first_name }}
                        {{ $rider->last_name }}
                        ({{ $rider->racing_number }})<br>
                        Age: {{$rider->age }}<br>
                    </span>

                    <span class="text-sm">Team: {{ $rider->team->name }}<br></span>
                    <span class="text-sm">Bike: {{ $rider->bike->make }}<br></span>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection