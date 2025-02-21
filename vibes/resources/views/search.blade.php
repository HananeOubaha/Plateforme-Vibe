
<form action="{{ url('/search') }}" method="GET">
    <input type="text" name="query" placeholder="Rechercher un utilisateur">
    <button type="submit">Rechercher</button>
</form>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} - {{ $user->email }}</li>
    @endforeach
</ul>
