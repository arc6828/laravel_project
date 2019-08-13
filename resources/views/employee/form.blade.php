<div>
  <strong>Name : </strong>
  <input
      type="text"
      name="name"
      value="{{ isset($employee->name) ?  $employee->name : '' }}"
      placeholder="name here..."
      />
</div>
<div>
  <strong>Age : </strong>
  <input type="number" name="age" value="{{ isset($employee->age) ? $employee->age : '' }}" placeholder="age here..." />
</div>
<div>
  <strong>Address : </strong>
  <input type="text" name="address" value="{{ isset($employee->address) ? $employee->address : '' }}" placeholder="address here..." />
</div>
<div>
  <strong>Salary : </strong>
  <input type="number" name="salary" value="{{  isset($employee->salary) ?  $employee->salary : '' }}" placeholder="salary here..."  />
</div>
<div>
  <strong>Position_id : </strong>
  <input type="number" name="position_id" value="{{ isset($employee->position_id) ?  $employee->position_id : '' }}" placeholder="position_id here..." />
</div>
