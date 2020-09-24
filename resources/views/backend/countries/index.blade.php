@extends('backend.admin')

@section('admin.content')
    <h1 class="text-xl mb-2">Countries</h1>
    <p class="text-sm mb-8">Add a new country or edit an existing one</p>

    <a href="/admin/countries/create" class="bg-red-600 text-white px-2 py-4">
        Add a new country
    </a>

    <div class="mt-8">
        @foreach ($countries as $country)
            <p class="mb-2">
                {{ $country->name }}
                <a href="/admin/countries/{{ $country->id }}/edit/" class="text-blue-600">
                    edit
                </a>
            </p>
        @endforeach
    </div>
@endsection