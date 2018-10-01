<h1>Create New Student</h1>
<form action="{{ url('/') }}/student" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	<div>
		<strong>name : </strong>
		<input type="text" name="name" placeholder="name here..." >
	</div>
	<div>
		<strong>hours per week : </strong>
		<input type="number" name="hours_per_week" placeholder="hours_per_week here..." >
	</div>
	<div>
		<strong>grade : </strong>
		<input type="text" name="grade" placeholder="grade here..." >
	</div>
	<div>
		<a href="{{ url('/') }}/student">back</a>
		<button type="submit">Create</button>
	</div>
</form>
