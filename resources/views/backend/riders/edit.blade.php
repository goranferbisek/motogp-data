@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Edit {{ $rider->name }} details</h1>

    <form method="POST" action="/admin/riders/{{ $rider->id }}">
        @csrf
        @method('PUT')

        <label for="name">Rider name:</label><br>
        <input
            type="text"
            name="name"
            id="name"
            class="border @if($errors->first('name')) border-red-600 @else border-blue-600 @endif"
            value="{{ $rider->name }}">
        @error('name')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>
        <label for="age">Age:</label><br>
        <input
            type="text"
            name="age"
            id="age"
            class="border @if($errors->first('age')) border-red-600 @else border-blue-600 @endif"
            value="{{ $rider->age }}"
        >
        @error('age')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>
        <label for="country_id">Country:</label><br>
        <select name="country_id" id="country_id">
                <option value="">--Select a country--</option>
            @foreach ($countries as $country)
                <option
                    value="{{ $country->id }}"
                    {{ $rider->country_id == $country->id ? 'selected' : '' }}
                >{{ $country->name }}</option>
            @endforeach
        </select>
        @error('country_id')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>
        <label for="racing_number">Racing number:</label><br>
        <input
            type="text"
            name="racing_number"
            id="racing_number"
            class="border @if($errors->first('racing_number')) border-red-600 @else border-blue-600 @endif"
            value="{{ $rider->racing_number }}">
        <br>
        @error('racing_number')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <label for="team_id">Team:</label><br>
        <select name="team_id" id="team_id">
                <option value="">--Select a team--</option>
            @foreach ($teams as $team)
                <option
                    value="{{ $team->id }}"
                    {{ $rider->team_id == $team->id ? 'selected' : '' }}
                >{{ $team->name }}</option>
            @endforeach
        </select>
        @error('team_id')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>
        <label for="bike_id">Bike:</label><br>
        <select name="bike_id" id="bike_id">
            <option value="">--Select a bike--</option>
            @foreach ($bikes as $bike)
                <option
                    value="{{ $bike->id }}"
                    {{ $rider->bike_id == $bike->id ? 'selected' : '' }}
                >{{ $bike->make }}</option>
            @endforeach
        </select>
        @error('bike_id')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>

        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
    <form method="POST" action="/admin/riders/{{ $rider->id }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="mt-2 p-2 bg-red-600">
    </form>
@endsection