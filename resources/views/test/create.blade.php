<form action="{{ url('/') }}/test" method="post">
  @csrf
  @method('POST')
  <div>
    <input name="descriptions[]" >
    <input name="prices[]" >
    <input name="units[]"  value="ชิ้น">
  </div>
  <div>
    <input name="descriptions[]" >
    <input name="prices[]" >
    <input name="units[]"  value="ชิ้น">
  </div>
  <div>
    <input name="descriptions[]" >
    <input name="prices[]" >
    <input name="units[]"  value="ชิ้น">
  </div>
  <div>
    <input type="hidden" name="descriptions[]" value="เพิ่มเติม" >
    <input type="hidden" name="prices[]" value="100">
    <input type="hidden" name="units[]" value="ชิ้น">
  </div>
  <button type="submit" name="button">submit</button>
</form>
