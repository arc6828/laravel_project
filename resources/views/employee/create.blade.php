<h1>Create New Employee</h1>
<a href="{{ url('/') }}/employee">back</a>
<form action="{{ url('/') }}/employee" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('POST') }}

	@include("employee/form")

	<div>
		<button type="submit">Create</button>
	</div>
</form>
