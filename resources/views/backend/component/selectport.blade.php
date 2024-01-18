<label for="port_id">Port</label>
<select class="form-control" data-placeholder="Select a Port" style="width: 100%;" name="port_id" id="port_id" multiple>
    <option value=''>---Select--</option>
    @foreach ($portName as $pname)
        <option value="{{ $pname['id'] }}">{{ $pname['port_name'] }}
        </option>
    @endforeach
</select>
<span class="invalid-feedback port-err" role="alert" id="port-err">
</span>
