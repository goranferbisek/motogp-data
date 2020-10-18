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
        <input type="text" name="age" id="age"><br>

        <label for="country">Country:</label><br>
        <select name="country" id="country">
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="number">Racing number:</label><br>
        <input type="text" name="number" id="number"><br>

        <hr>
        <label for="team">Team:</label><br>
        <select name="team" id="team">
            @foreach ($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="bike">Bike:</label><br>
        <select name="bike" id="bike">
            @foreach ($bikes as $bike)
                <option value="{{ $bike->id }}">{{ $bike->make }}</option>
            @endforeach
        </select>
        <br>

        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
@endsection