<h1>Create New Employee</h1>
<a href="{{ url('/') }}/employee">back</a>
<form action="{{ url('/') }}/employee" method="POST" enctype="multipart/form-data">
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
	<div  style="display: none;">
		<strong>Position_id : </strong>
        <select name="position_id2" disabled="">
            @foreach([] as $position)
            <option value="{{ $position->id }}">
            	{{ $position->name }}
            </option>
            @endforeach
        </select>
	</div>
	<div style="display: none;">
		<strong>Img : </strong>
		<input type="file" name="image" placeholder="upload image here ..." disabled >
	</div>
	<div>
		<button type="submit">Create</button>
	</div>
</form>
