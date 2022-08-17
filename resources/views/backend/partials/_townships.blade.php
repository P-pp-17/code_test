<select name="township_id" id="township" class="form-control js-select-2 col-md-4">
    <option value="0">Select Township</option>
    @if($townships->isNotEmpty())
    @foreach($townships as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
    @endif
</select>
