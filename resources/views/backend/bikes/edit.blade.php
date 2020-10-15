@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Edit this bike</h1>

    <form method="POST" action="/admin/bikes/{{ $bike->id }}">
        @csrf
        @method('PUT')

        <label for="make">Bike make:</label><br>
        <input type="text" name="make" id="make"
            class="border @if($errors->first('make')) border-red-600 @else border-blue-600 @endif"
            value="{{ $bike->make }}"
        >
        @error('make')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>
        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
    <form method="POST" action="/admin/bikes/{{ $bike->id }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="mt-2 p-2 bg-red-600">
    </form>
@endsection