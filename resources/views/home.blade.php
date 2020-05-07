@extends('layout')

@section('content')
    <h1 class="text-xl">Race results</h1>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Event</th>
                <th class="px-4 py-2">Track</th>
                <th class="px-4 py-2">Country</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2">8 Mar</td>
                <td class="px-4 py-2">VisitQatar Grand Prix</td>
                <td class="px-4 py-2">Losail International Circuit</td>
                <td class="px-4 py-2">Qatar</td>
            </tr>
            <tr>
                <td class="px-4 py-2">26 Mar</td>
                <td class="px-4 py-2">Gran Premio Red Bull de España</td>
                <td class="px-4 py-2">Circuito de Jerez - Angel Nieto</td>
                <td class="px-4 py-2">Spain</td>
            </tr>
            <tr>
                <td class="px-4 py-2">13 Mar</td>
                <td class="px-4 py-2">SHARK Helmets Grand Prix de France</td>
                <td class="px-4 py-2">Lemans</td>
                <td class="px-4 py-2">France</td>
            </tr>
        </tbody>
    </table>

    <h1 class="text-xl">Upcomming races</h1>
@endsection
