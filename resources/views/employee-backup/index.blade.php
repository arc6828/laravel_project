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
			<a href="javascript:void(0)" onclick="onDelete( {{ $row->employee_id }} )">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
<div style="display:none;">
	<form action="#" method="POST" id="form_delete" >
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
		<button type="submit">Delete</button>
	</form>
	<script>
		function onDelete(id){
			//--THIS FUNCTION IS USED FOR SUBMIT FORM BY script--//

			//GET FORM BY ID
			var form = document.getElementById("form_delete");
			//CHANGE ACTION TO SPECIFY ID
			form.action = "{{ url('/') }}/employee/"+id;
			//SUBMIT
			var want_to_delete = confirm('Are you sure to delete this employee?');
			if(want_to_delete){
				form.submit();
			}
		}
	</script>
</div>
<div>
	<img src="{{ url('/') }}/storage/avatar/25T3ZMtqvqW07Vy6aRyqHr0hunD5B8OKrfzbEHTJ.jpeg">
</div>
