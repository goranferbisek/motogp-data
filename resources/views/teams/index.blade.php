<ul>
    @foreach ($teams as $team)
        <li>{{ $team->name }}</li>
    @endforeach
</ul>