@include ('partials.head')

<h1>Fergus Technical Challenge</h1>
<p>View Tradie Details</p>
<ul>
    @foreach ($users as $user)
        
        <li><a href="/users/{{ $user->id }}">{{ $user->name }}</a></li>
    @endforeach
</ul>

@include('partials.foot')