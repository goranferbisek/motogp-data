@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">New Team</h1>
    <p class="text-sm mb-8">Add a new racing team</p>

    <form method="POST" action="/admin/teams">
        @csrf
        @method('POST')

        <label for="name">Team name:</label><br>
        <input
            type="text"
            name="name"
            id="name"
            class="border @if($errors->first('name')) border-red-600 @else border-blue-600 @endif"
            value="{{ old('name') }}">
        @error('name')
            <p class="text-red-900">{{ $errors->first('name') }}</p>
        @enderror
        <br>
        <input type="submit" value="Submit" class="mt-2 p-2 bg-blue-300">
    </form>
@endsection