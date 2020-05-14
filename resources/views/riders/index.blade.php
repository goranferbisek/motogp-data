@extends('layout')

@section('content')
<main>
    <h1 class="text-xl text-red-600 text-center mb-6">Riders</h1>

    <div class="grid grid-cols-4 gap-4"> {{-- card container--}}
        @foreach ($riders as $rider)
            <div class="bg-blue-200"> {{-- card --}}
                <div class="flex items-center justify-between">
                    <img
                        src="images/flags/{{$rider->country->icon ?: 'default-flag.svg' }}"
                        alt="{{ $rider->country->name }}"
                        class="h-4"
                    >
                    <span>{{ $rider->first_name}} {{$rider->last_name}} {{$rider->racing_number}}</span>
                    <span>age: {{$rider->age }}</span>
                </div>
                <img
                    src="images/riders/{{ $rider->photo ?: 'default-photo.jpg' }}"
                    alt="{{ $rider->first_name}} {{$rider->last_name}} {{$rider->racing_number}}"
                    class=""
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