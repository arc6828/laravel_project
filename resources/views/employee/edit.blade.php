<h1>Edit Employee : {{ $employee->id }}</h1>
<a href="{{ url('/') }}/employee">back</a>
<form action="{{ url('/') }}/employee/{{ $employee->id }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}

  @include("employee/form")

  <div>
		<button type="submit">Update</button>
	</div>
</form>
