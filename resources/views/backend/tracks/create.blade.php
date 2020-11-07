@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">New track</h1>
    <p class="text-sm mb-8">Add a new track</p>

    <form method="POST" action="/admin/tracks">
        @csrf
        @method('POST')

        <label for="name">Track name:</label><br>
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
        <label for="length">Length (meters):</label><br>
        <input
            type="text"
            name="length"
            id="length"
            class="border @if($errors->first('length')) border-red-600 @else border-blue-600 @endif"
            value="{{ old('length') }}"
        >
        @error('length')
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
        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
    </div>
@endsection