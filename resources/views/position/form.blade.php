<div>
  <strong>Name : </strong>
  <input
      type="text"
      name="name"
      value="{{ isset($position->name) ?  $position->name : '' }}"
      placeholder="name here..."
      />
</div>
<div>
  <strong>Description : </strong>
  <input type="text" name="description" value="{{ isset($position->description) ? $position->description : '' }}" placeholder="description here..." />
</div>
