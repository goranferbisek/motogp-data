@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Edit this country</h1>

    <form method="POST" action="/admin/countries/{{ $country->id }}">
        @csrf
        @method('PUT')

        <label for="name">Country name:</label><br>
        <input type="text" name="name" id="name"
            class="border @if($errors->first('name')) border-red-600 @else border-blue-600 @endif"
            value="{{ $country->name }}"
        >
        @error('name')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <br>
        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
    <form method="POST" action="/admin/countries/{{ $country->id }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="mt-2 p-2 bg-red-600">
    </form>
@endsection