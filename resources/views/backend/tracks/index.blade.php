@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Tracks</h1>
    <p class="text-sm mb-8">Add a new track or edit an existing one</p>

    <a href="/admin/tracks/create" class="bg-red-600 text-white px-2 py-4">
        Create a new track
    </a>

    <div class="mt-8">
        @foreach ($tracks as $track)
            <p class="mb-2">
                {{ $track->name }}
                <a href="/admin/tracks/{{ $track->id }}/edit/" class="text-blue-600">
                    edit
                </a>
            </p>
        @endforeach
    </div>
@endsection