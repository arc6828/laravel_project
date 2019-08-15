<h1>Edit Employee : {{ $position->id }}</h1>
<form action="{{ url('/') }}/position/{{ $position->id }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}

  	@include("position/form")

		<div>
			<a href="{{ url('/') }}/position">back</a>
			<button type="submit">Update</button>
		</div>
</form>
