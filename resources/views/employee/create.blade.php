<h1>Create New Employee</h1>
<form action="{{ url('/') }}/employee" method="POST">
	{{ csrf_field() }}
	{{ method_field('POST') }}
	<div>
		<strong>Name : </strong>
		<input type="text" name="name" placeholder="name here..." >
	</div>
	<div>
		<strong>Age : </strong>
		<input type="number" name="age" placeholder="age here..." >
	</div>
	<div>
		<strong>Address : </strong>
		<input type="text" name="address" placeholder="address here..." >
	</div>
	<div>
		<strong>Salary : </strong>
		<input type="number" step="any" name="salary" placeholder="salary here..." >
	</div>
	<div>
		<strong>Position_id : </strong>
		<input type="number" step="step" name="position_id" placeholder="position_id here..." >
	</div>
	<div>
		<strong>Position_id : </strong>
        <select name="position_id">
            @foreach($table_position as $row_position)
            <option value="{{ $row_position->position_id }}">{{ $row_position->position_name }}</option>
            @endforeach
        </select>
	</div>
	<div>
		<a href="{{ url('/') }}/employee">back</a>
		<button type="submit">Create</button>
	</div>
</form>
