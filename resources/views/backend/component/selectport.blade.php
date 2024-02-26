<label for="port_id">Port</label>
<select class="form-control" data-placeholder="Select a Port" style="width: 100%;" name="port_id[]" id="port_id" multiple>
    <option value=''>---Select--</option>
    @foreach ($portName as $pname)
        <option value="{{ $pname['id'] }}" @if(in_array($pname['id'], old('port_id', []))) selected @endif>
            {{ $pname['port_name'] }}
        </option>
    @endforeach
</select>
@error('port_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
