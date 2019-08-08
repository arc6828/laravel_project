@forelse($table_employee as $row)
<h1>Edit Employee : {{ $row->employee_id }}</h1>
	<form action="{{ url('/') }}/employee/{{ $row->employee_id }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
    	<div>
    		<strong>Name : </strong>
    		<input type="text" name="name" value="{{ $row->name }}" placeholder="name here..." >
    	</div>
    	<div>
    		<strong>Age : </strong>
    		<input type="number" name="age" value="{{ $row->age }}" placeholder="age here..." >
    	</div>
    	<div>
    		<strong>Address : </strong>
    		<input type="text" name="address" value="{{ $row->address }}" placeholder="address here..." >
    	</div>
    	<div>
    		<strong>Salary : </strong>
    		<input type="number" name="salary" value="{{ $row->salary }}" placeholder="salary here..."  >
    	</div>
    	<div>
    		<strong>Position_id : </strong>
    		<input type="number" name="position_id" value="{{ $row->position_id }}" placeholder="position_id here..." >
    	</div>
    	<div>
    		<strong>Position_id : </strong>
            <select name="position_id">
                @foreach($table_position as $row_position)
                <option value="{{ $row_position->position_id }}"
						{{ $row_position->position_id === $row->position_id ? "selected" : "" }}>
					{{ $row_position->position_name }}
				</option>
                @endforeach
            </select>
    	</div>
		<div>
			<a href="{{ url('/') }}/employee">back</a>
			<button type="submit">Update</button>
		</div>
	</form>
@empty
	<h1>This Employee id does not exist</h1>
@endforelse
