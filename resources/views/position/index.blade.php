<h1>Position List</h1>
<div>
	<a href="{{ url('/') }}/position/create">New Position</a>
</div>

<div>
	<form action="{{ url('/') }}/employee" method="GET">
		<input type="text" name="q" placeholder="type your keyword..." value="{{ $q }}">
		<button type="submit">Search</button>
	</form>
</div>

<table border=1>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>description</th>
		<th>action</th>
	</tr>
	@foreach($positions as $position)
	<tr>
		<td>{{ $position->id }}</td>
		<td>{{ $position->name }}</td>
		<td>{{ $position->description }}</td>
		<td>
			<a href="{{ url('/') }}/position/{{ $position->id }}">View</a>
			<a href="{{ url('/') }}/position/{{ $position->id }}/edit">Edit</a>
			<a href="javascript:void(0)" onclick="onDelete( {{ $position->id }} )">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
