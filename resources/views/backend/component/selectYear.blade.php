<div class="col-12">
    <!-- Default box -->
    @foreach ($portsArrs as $key => $value)
        @php
            $portkey[] = $value['category_name'];
            $azRange = range('A', 'Z');
            $letter = $azRange[$key]; // Assuming $key is a valid index
        @endphp
        {{-- {{dd($value[$portkey[0]])}} --}}
        <div class="card">
            <div
                class="card-header @if ($value['category_name'] == 'Major Port') bg-blue
        @elseif ($value['category_name'] == 'Non Major Port') bg-cyan
        @elseif ($value['category_name'] == 'Shipping Sector') bg-purple
        @elseif ($value['category_name'] == 'Other Organisations') bg-pink
        @elseif ($value['category_name'] == 'Sagarmala + ALHW Project') bg-red
        @else bg-default @endif">
                <h3 class="card-title">{{ $letter }}.
                    {{ $value['category_name'] }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="">
                        <thead>
                            <tr>
                                <th colspan="1" rowspan="2">PORTS</th>
                                <th colspan="1" rowspan="2">PERIOD</th>
                                <th colspan="3" style="text-align: center;">BE
                                </th>
                                <th colspan="3" style="text-align: center;">
                                    Monthly
                                    Exp
                                </th>
                                <th colspan="2" style="text-align: right;">(
                                    &#8377;
                                    crore)
                            </tr>

                            <tr>
                                <th scope="col" style="text-align: center;">GBS
                                </th>
                                <th scope="col" style="text-align: center;">IEBR
                                </th>
                                <th scope="col" style="text-align: center;">TOTAL
                                </th>
                                <th scope="col" style="text-align: center;">GBS
                                </th>
                                <th scope="col" style="text-align: center;">IEBR
                                </th>
                                <th scope="col" style="text-align: center;">PPP
                                </th>
                                <th scope="col" style="text-align: center;">
                                    TOTAL
                                </th>
                                {{-- <th scope="col" style="text-align: center;">Action
                                </th> --}}
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($value['slug'] as $portdatakey => $portdatavalue)
                                <tr class="curr_row_12">
                                    <td scope="col" style="width: 500px;">
                                        <span>{{ $portdatavalue['port_name'] }}</span>
                                        <input type="hidden" class="form-control " name="port_type[]"
                                            value="{{ $portdatavalue['port_type'] }}" readonly>
                                        <input type="hidden" class="form-control " name="port_id[]"
                                            value="{{ $portdatavalue['id'] }}" readonly>
                                    </td>
                                    <td scope="col" style="width: 200px;"><b>
                                            {{-- <p class="monthyearcomm"></p> --}}
                                            <p class="">
                                                {{ $portdatavalue['select_year'] }}
                                            </p>
                                        </b></td>
                                    <td scope="col" style="width: 200px; text-align:center;">
                                        {{ $portdatavalue['GBS'] }}</td>
                                    <td scope="col" style="width: 200px; text-align:center;">
                                        {{ $portdatavalue['IEBR'] }}
                                    </td>
                                    <td scope="col" style="width: 200px; text-align:center;">
                                        <b>{{ $portdatavalue['total'] }}</b>
                                    </td>
                                    <td scope="col" style="width: 200px; text-align:center;">
                                        <input type="text" class="form-control numeric_input" name="GBS[]"
                                            spellcheck="false" data-ms-editor="true">
                                    </td>
                                    <td scope="col" style="width: 200px; text-align:center;">
                                        <input type="text" class="form-control numeric_input" name="IEBR[]"
                                            spellcheck="false" data-ms-editor="true">
                                    </td>
                                    <td scope="col" style="width: 200px; text-align:center;">
                                        <input type="text" class="form-control numeric_input" name="PPP[]"
                                            spellcheck="false" data-ms-editor="true">
                                    </td>
                                    <td scope="col" style="width: 200px; text-align:center;">
                                        <b><input type="text" name="total[]" class="total form-control"
                                                id="total" value="0" readonly></b>
                                    </td>
                                    {{-- <td scope="col"
                                        style="width: 200px; text-align:center;"><b><a
                                                href="javascript:void(0)"
                                                data-toggle="modal"
                                                data-target="#editmodal-xl"
                                                class="edit-user" data-UserId=""><i
                                                    class="far fa-edit"
                                                    aria-hidden="true"></i></a></b>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    @endforeach
    <!-- /.card -->
</div>
