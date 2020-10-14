@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">New Bike</h1>
    <p class="text-sm mb-8">Add a new bike</p>

    <form method="POST" action="/admin/bikes">
        @csrf
        @method('POST')

        <label for="make">Bike make:</label><br>
        <input
            type="text"
            name="make"
            id="make"
            class="border @if($errors->first('make')) border-red-600 @else border-blue-600 @endif"
            value="{{ old('make') }}">
        @error('make')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>
        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
@endsection