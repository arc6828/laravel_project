
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

<div style="display: none;">
  <strong>Img : </strong>
  <input type="file" name="image" placeholder="upload image here ..." disabled >
</div>
