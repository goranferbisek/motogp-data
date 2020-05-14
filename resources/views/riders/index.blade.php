@extends('layout')

@section('content')
<main>
    <h1 class="text-xl text-red-600 text-center mb-6">Riders</h1>

    <div class="flex flex-wrap -mx-4"> {{-- card container--}}
        @foreach ($riders as $rider)
            <div class="w-1/4 bg-blue-200 px-2 pb-4"> {{-- card --}}
                <div class="bg-white">
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
            </div>
        @endforeach
    </div>

</main>
@endsection