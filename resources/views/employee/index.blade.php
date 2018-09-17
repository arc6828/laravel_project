<h1>Employee List</h1>
<div>
	<a href="{{ url('/') }}/employee/create">New Employee</a>
</div>

<table border=1>
<tr>
		<th>employee_id</th>
		<th>name</th>
		<th>age</th>
		<th>address</th>
		<th>salary</th>
		<th>position_id</th>
		<th>position_name</th>
		<th>action</th>
	</tr>
	@foreach($table_employee as $row)
	<tr>
		<td>{{ $row->employee_id }} </td>
		<td>{{ $row->name }} </td>
		<td>{{ $row->age }}</td>
		<td>{{ $row->address }}</td>
		<td>{{ $row->salary }}</td>
		<td>{{ $row->position_id }}</td>
		<td>{{ $row->position_name }}</td>
		<td>
			<a href="{{ url('/') }}/employee/{{ $row->employee_id }}">View</a>
			<a href="{{ url('/') }}/employee/{{ $row->employee_id }}/edit">Edit</a>
		</td>
	</tr>
	@endforeach
</table>
