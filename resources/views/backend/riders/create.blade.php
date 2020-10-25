@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">New Rider</h1>
    <p class="text-sm mb-8">Add a new rider</p>

    <form method="POST" action="/admin/riders">
        @csrf
        @method('POST')

        <label for="name">Rider name:</label><br>
        <input
            type="text"
            name="name"
            id="name"
            class="border @if($errors->first('name')) border-red-600 @else border-blue-600 @endif"
            value="{{ old('name') }}">
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
            value="{{ old('age') }}"
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
                    {{ old('country_id') == $country->id ? 'selected' : '' }}
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
            value="{{ old('racing_number')}}">
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
                    {{ old('team_id') == $team->id ? 'selected' : '' }}
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
                    {{ old('bike_id') == $bike->id ? 'selected' : '' }}
                >{{ $bike->make }}</option>
            @endforeach
        </select>
        @error('bike_id')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>

        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
@endsection