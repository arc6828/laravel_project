<h1>Create New Employee</h1>
<form action="{{ url('/') }}/position" method="POST" >
	{{ csrf_field() }}
	{{ method_field('POST') }}

	@include("position/form")

	<div>
		<a href="{{ url('/') }}/position">back</a>
		<button type="submit">Create</button>
	</div>
</form>
