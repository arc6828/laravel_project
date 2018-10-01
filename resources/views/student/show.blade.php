@forelse($table_student as $row)
	<h1>student : {{ $row->student_id }} </h1>
	<div>
		<strong>name : </strong>
		<span>{{ $row->name }} </span>
	</div>
	<div>
		<strong>hours per week : </strong>
		<span>{{ $row->hours_per_week }}</span>
	</div>
	<div>
		<strong>grade : </strong>
		<span>{{ $row->grade }}</span>
	</div>	
	<div>
		<a href="{{ url('/') }}/student">back to student</a>
	</div>
@empty
	<div>This student "id" does not exist</div>
@endforelse
