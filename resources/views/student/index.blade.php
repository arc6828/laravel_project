<h1>Student List</h1>
<div>
	<a href="{{ url('/') }}/student/create">New Student</a>
</div>

<table border=1>
	<tr>
		<th>student_id</th>
		<th>name</th>
		<th>hour per week</th>
		<th>grade</th>
		<th>action</th>
	</tr>
	@foreach($table_student as $row)
	<tr>
		<td>{{ $row->student_id }} </td>
		<td>{{ $row->name }} </td>
		<td>{{ $row->hours_per_week }}</td>
		<td>{{ $row->grade }}</td>
		<td>
			<a href="{{ url('/') }}/student/{{ $row->student_id }}">View</a>
			<a href="{{ url('/') }}/student/{{ $row->student_id }}/edit">Edit</a>
			<a href="javascript:void(0)" onclick="onDelete( {{ $row->student_id }} )">Delete</a>
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
			form.action = "{{ url('/') }}/student/"+id;
			//SUBMIT
			var want_to_delete = confirm('Are you sure to delete this employee?');
			if(want_to_delete){
				form.submit();
			}
		}
	</script>
</div>
