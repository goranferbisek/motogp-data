@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Bikes</h1>
    <p class="text-sm mb-8">Add a new bike or edit an existing one</p>

    <a href="/admin/bikes/create" class="bg-red-600 text-white px-2 py-4">
        Add a new bike
    </a>

    <div class="mt-8">
        @foreach ($bikes as $bike)
            <p class="mb-2">
                {{ $bike->name }}
                <a href="/admin/bikes/{{ $bike->id }}/edit/" class="text-blue-600">
                    edit
                </a>
            </p>
        @endforeach
    </div>
@endsection