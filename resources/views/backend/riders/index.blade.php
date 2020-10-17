@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Riders</h1>
    <p class="text-sm mb-8">Add a new rider or edit an existing one</p>

    <a href="/admin/riders/create" class="bg-red-600 text-white px-2 py-4">
        Add a new rider
    </a>

    <div class="mt-8">
        @foreach ($riders as $rider)
            <p class="mb-2">
                {{ $rider->name }}
                <a href="/admin/riders/{{ $rider->id }}/edit/" class="text-blue-600">
                    edit
                </a>
            </p>
        @endforeach
    </div>
@endsection