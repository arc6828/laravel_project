
<h1>Edit Employee : {{ $employee->id }}</h1>
<a href="{{ url('/') }}/employee">back</a>
<form action="{{ url('/') }}/employee/{{ $employee->id }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<div>
		<strong>Name : </strong>
		<input type="text" name="name" value="{{ $employee->name }}" placeholder="name here..." >
	</div>
	<div>
		<strong>Age : </strong>
		<input type="number" name="age" value="{{ $employee->age }}" placeholder="age here..." >
	</div>
	<div>
		<strong>Address : </strong>
		<input type="text" name="address" value="{{ $employee->address }}" placeholder="address here..." >
	</div>
	<div>
		<strong>Salary : </strong>
		<input type="number" name="salary" value="{{ $employee->salary }}" placeholder="salary here..."  >
	</div>
	<div>
		<strong>Position_id : </strong>
		<input type="number" name="position_id" value="{{ $employee->position_id }}" placeholder="position_id here..." >
	</div>
	<div  style="display: none;">
		<strong>Position_id : </strong>
        <select name="position_id2" disabled>
            @foreach([] as $position)
            <option 
                value="{{ $position->id }}"
				{{ $position->id === $employee->position_id ? "selected" : "" }} 
                >
				{{ $position->name }}
			</option>
            @endforeach
        </select>
	</div>
	<div>
		<button type="submit">Update</button>
	</div>
</form>

