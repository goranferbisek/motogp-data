@extends('layout')

@section('content')
<main>
    <h1 class="text-xl text-red-600 text-center mb-6">Riders</h1>

    <div class="flex">
        @foreach ($riders as $rider)
            <div class="w-1/4 mx-4">
                <div>Country |
                    {{ $rider->first_name .' '.$rider->last_name .' '.
                    $rider->racing_number .' age:'. $rider->age }}
                </div>
                <hr>
                <img src="images/riders/vr46.jpg" alt="Valentino Rossi 46">
                <div>
                    Team: {{ $rider->team->name  }}
                </div>
            </div>
        @endforeach
    </div>

</main>
@endsection