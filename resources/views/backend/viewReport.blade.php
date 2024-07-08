@extends('layouts.master')

@section('css')
    {{-- --}}
    <style>
        .h4,
        h4 {
            font-size: 18px;
        }

        .h5,
        h5 {
            font-size: 14px;
        }

        .h6,
        h6 {
            font-size: 12px;
        }

        .dropdown-menu {
            width: 250px;
        }

        .year-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0ad4e;
            padding: 10px;
            color: white;
            border-radius: 0px;
            margin-bottom: 10px;
        }

        .months-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 5px;
            padding: 5px;
        }

        .month-item {
            padding: 5px;
            text-align: center;
            background-color: #f7f7f7;
            border: 0px solid #ddd;
            border-radius: 1px;
            cursor: pointer;
        }

        .month-item:hover,
        .month-item.active {
            background-color: #ffd700;
            color: black;
            font-weight: bold;
        }

        .dropdown-menu {
            padding: 0 0;
        }
    </style>
    {{-- --}}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {{-- <form> --}}
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Commodity Wise and Category Wise Cargo Traffic Handled At Ports-Port Wise
                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- Filter Form Start --}}
                        <form method="get" action="{{ route('viewReportFilter') }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="port_type">Port Type <span style="color: red;">*</span></label>
                                        <select class="form-control @error('port_type') is-invalid @enderror"
                                            name="port_type" @if(empty($allPortsType)) id="port_type" @endif>
                                            <option value="">Select Port Type</option>
                                            @if(!empty($allPortsType))
                                            <option value="{{$allPortsType->id}}" selected>{{$allPortsType->category_name}}</option>
                                            @endif
                                        </select>
                                        @error('port_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @if(!empty($allStartBoards))
                                <div class="col-md-2" id="startBoard_div">
                                    <div class="form-group">
                                        <label for="state_board">State Board <span style="color: red;">*</span></label>
                                        <select class="form-control @error('state_board') is-invalid @enderror"
                                            name="state_board" id="state_board" value="{{ old('state_board') }}">
                                            <option value='' selected disabled>All State</option>
                                        </select>
                                        @error('state_board')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="port_name">Port Name <span style="color: red;">*</span></label>
                                        <select class="form-control @error('port_name') is-invalid @enderror"
                                            name="port_name" value="{{ old('port_name') }}" @if(empty($portAssigned)) id="port_name" @endif>
                                            <option value=''>All Port</option>
                                            @if(!empty($portAssigned))
                                            <option value="{{$portAssigned->id}}" selected>{{$portAssigned->port_name}}</option>
                                            @endif
                                        </select>
                                        @error('port_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="monthYearSelectStart">Select Start Month and Year <span
                                                style="color: red;">*</span></label>
                                        <div class="dropdown">
                                            <input
                                                class="dropdown-toggle form-control @error('startmonthYear') is-invalid @enderror"
                                                type="text" name="startmonthYear" id="monthYearDropdownStart"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                readonly placeholder="Month and Year" />
                                            <div class="dropdown-menu" aria-labelledby="monthYearDropdownStart">
                                                <div class="year-nav">
                                                    <a id="prevYearStart" class="btn btn-link text-white">❮</a>
                                                    <span id="currentYearStart">Year 2024</span>
                                                    <a id="nextYearStart" class="btn btn-link text-white">❯</a>
                                                </div>
                                                <div class="months-grid" id="monthsGridStart">
                                                    <div class="month-item" data-month="01">Jan</div>
                                                    <div class="month-item" data-month="02">Feb</div>
                                                    <div class="month-item" data-month="03">Mar</div>
                                                    <div class="month-item" data-month="04">Apr</div>
                                                    <div class="month-item" data-month="05">May</div>
                                                    <div class="month-item" data-month="06">June</div>
                                                    <div class="month-item" data-month="07">July</div>
                                                    <div class="month-item" data-month="08">Aug</div>
                                                    <div class="month-item" data-month="09">Sep</div>
                                                    <div class="month-item" data-month="10">Oct</div>
                                                    <div class="month-item" data-month="11">Nov</div>
                                                    <div class="month-item" data-month="12">Dec</div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('startmonthYear')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="monthYearSelectEnd">Select End Month and Year <span
                                                style="color: red;">*</span></label>
                                        <div class="dropdown">
                                            <input
                                                class="dropdown-toggle form-control @error('endmonthYear') is-invalid @enderror"
                                                type="text" name="endmonthYear" id="monthYearDropdownEnd"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                readonly placeholder="Month and Year" />
                                            <div class="dropdown-menu" aria-labelledby="monthYearDropdownEnd">
                                                <div class="year-nav">
                                                    <a id="prevYearEnd" class="btn btn-link text-white">❮</a>
                                                    <span id="currentYearEnd">Year 2024</span>
                                                    <a id="nextYearEnd" class="btn btn-link text-white">❯</a>
                                                </div>
                                                <div class="months-grid" id="monthsGridEnd">
                                                    <div class="month-item" data-month="01">Jan</div>
                                                    <div class="month-item" data-month="02">Feb</div>
                                                    <div class="month-item" data-month="03">Mar</div>
                                                    <div class="month-item" data-month="04">Apr</div>
                                                    <div class="month-item" data-month="05">May</div>
                                                    <div class="month-item" data-month="06">June</div>
                                                    <div class="month-item" data-month="07">July</div>
                                                    <div class="month-item" data-month="08">Aug</div>
                                                    <div class="month-item" data-month="09">Sep</div>
                                                    <div class="month-item" data-month="10">Oct</div>
                                                    <div class="month-item" data-month="11">Nov</div>
                                                    <div class="month-item" data-month="12">Dec</div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('endmonthYear')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <br />
                                    <button type="submit" class="btn btn-primary mt-2" id="">Submit</button>
                                </div>
                            </div>
                        </form>
                        {{-- Filter Form End --}}
                        <div class="row p-2">
                            
                        </div>


                        @if(!empty($merged_array))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row bg-green p-2">
                                    <div class="col-md-12">
                                        <center><!--p class="lead text-bold">Report Details</p-->
                                            <h4>
                                                Cargo Traffic Handled At Major Ports
                                            </h4>
                                        </center>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6" style="background-color: #db8b0b !important; padding:10px;">
                                        <b>Port : {{$portAssigned->port_name}}</b>
                                    </div>
                                    <div class="col-md-6  text-right"
                                        style="background-color: #00c0ef !important; padding:10px;">
                                        <b>Period : {{$startMonth}}-{{$startYear}} - {{$endMonth}}-{{$endYear}} </b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover dataTable table-striped">
                                        <thead class="bg-blue">
                                            <tr>
                                                <th width="4%" rowspan="3">S.No.</th>
                                                <th style="text-align: center" rowspan="3">Commodity Name</th>
                                                <th colspan="5">
                                                    <center>Overseas (in Tonnes)</center>
                                                </th>
                                                <th colspan="5">
                                                    <center>Coastal (in Tonnes)</center>
                                                </th>
                                                <th rowspan="3">Grand <br> Total <br>(in Tonnes)</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">
                                                    <center>Unloaded</center>
                                                </th>
                                                <th colspan="2">
                                                    <center>Loaded</center>
                                                </th>
                                                <th rowspan="2">
                                                    <center>Total</center>
                                                </th>
                                                <th colspan="2">
                                                    <center>Unloaded</center>
                                                </th>
                                                <th colspan="2">
                                                    <center>Loaded</center>
                                                </th>
                                                <th rowspan="2">
                                                    <center>Total</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                                <th style="text-align: center">IF</th>
                                                <th style="text-align: center">FF</th>
                                            </tr>
                                        </thead>

                                        <tbody id="records">
                                            {{-- @if(!empty($merged_array)) --}}
                                            @foreach ($commodityArr as $commodityData)
                                                @foreach ($commodityData['sub'] as $subCommodity)
                                                    <tr class="2">
                                                        <td class="text-center text-bold h4">
                                                            A </td>
                                                        <td class="text-bold h4"> {{ $subCommodity['sub']['name'] }}</td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                        <td class="text-center h6"></td>
                                                    </tr>
                                                    @foreach ($subCommodity['innersub'] as $innerKey => $innerSubData)
                                                        <tr class="3">
                                                            <td class="text-center h5">
                                                                1 </td>
                                                            <td class="h5"> {{ $innerSubData['innersub']['name'] }} <strong>= ID {{ $innerSubData['innersub']['id'] }}</strong></td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['ov_ul_if']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['ov_ul_ff']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['ov_l_if']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['ov_l_ff']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['ov_total']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['co_ul_if']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['co_ul_ff']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['co_l_if']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['co_l_ff']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['co_total']}} @else 0 @endif </td>
                                                            <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubData['innersub']['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubData['innersub']['id']]['grand_total']}} @else 0 @endif </td>
                                                        </tr>

                                                        @foreach ($innerSubData['innermostsub'] as $innerSubMostData)
                                                            <tr class="3">
                                                                <td class="text-center h5">
                                                                    1 </td>
                                                                <td class="h5">{{ $innerSubMostData['name'] }}</td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['ov_ul_if']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['ov_ul_ff']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['ov_l_if']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['ov_l_ff']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['ov_total']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['co_ul_if']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['co_ul_ff']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['co_l_if']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['co_l_ff']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['co_total']}} @else 0 @endif </td>
                                                                <td class="text-center h6">@if(!empty($merged_array) && (in_array($innerSubMostData['id'],array_keys($merged_array)))) {{ $merged_array[$innerSubMostData['id']]['grand_total']}} @else 0 @endif </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach


                                                    {{-- <tr>
                                                        <td class="text-center">

                                                        </td>
                                                        <td class="text-bold">
                                                            Total (in Tonnes)
                                                        </td>
                                                        <td class="text-center text-bold">
                                                            363 </td>
                                                        <td class="text-center text-bold">
                                                            1201904 </td>
                                                        <td class="text-center text-bold">
                                                            152132 </td>
                                                        <td class="text-center text-bold">
                                                            2202699 </td>
                                                        <td class="text-center text-bold">
                                                            3557098 </td>
                                                        <td class="text-center text-bold">
                                                            54831 </td>
                                                        <td class="text-center text-bold">
                                                            9983 </td>
                                                        <td class="text-center text-bold">
                                                            7912 </td>
                                                        <td class="text-center text-bold">
                                                            0 </td>
                                                        <td class="text-center text-bold">
                                                            72726 </td>
                                                        <td class="text-center text-bold">
                                                            3629824 </td>
                                                    </tr> --}}
                                                @endforeach
                                            @endforeach
                                            {{-- @endif --}}
                                        </tbody>
                                    </table>
                                    <div class="col-md-4 pull-right">
                                        <div class="form-group">
                                            <label class="text-light-blue">Remarks</label><span class="asterisk text-red">
                                            </span><label>
                                            </label>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                        @endif



                    </div>
                </div>
            </div>
            {{--
        </form> --}}

        </section>
        <!--  -->
    </div>
    <!-- /.content-wrapper -->

    <!-- MODAL -->
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{ asset('backend/js/port.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script defer>
        function initMonthYearPicker(startOrEnd) {
            const currentYearElement = document.getElementById(`currentYear${startOrEnd}`);
            const monthItems = document.querySelectorAll(`#monthsGrid${startOrEnd} .month-item`);
            const dropdownToggle = document.getElementById(`monthYearDropdown${startOrEnd}`);
            let currentYear = new Date().getFullYear();

            function updateYearDisplay() {
                currentYearElement.textContent = `Year ${currentYear}`;
            }

            function handleClick(event) {
                event.stopPropagation(); // Prevents the dropdown from closing
            }

            document.getElementById(`prevYear${startOrEnd}`).addEventListener('click', function(event) {
                handleClick(event);
                currentYear--;
                updateYearDisplay();
            });

            document.getElementById(`nextYear${startOrEnd}`).addEventListener('click', function(event) {
                handleClick(event);
                currentYear++;
                updateYearDisplay();
            });

            monthItems.forEach(item => {
                item.addEventListener('click', function() {
                    
                    document.querySelector(`#monthsGrid${startOrEnd} .month-item.active`)?.classList.remove(
                        'active');
                    this.classList.add('active');
                    const selectedMonth = this.getAttribute('data-month');
                    const selectedYear = currentYear;
                    dropdownToggle.value = `${this.textContent} - ${selectedYear}`;
                });
            });

            updateYearDisplay();
        }

        document.addEventListener('DOMContentLoaded', function() {
            var startmonth = '{{ $startMonth }}';
            var startyear = '{{ $startYear }}';
            var startmonthyear = startmonth + ' - ' + startyear;

            var endmonth = '{{ $endMonth }}';
            var endyear = '{{ $endYear }}';
            var endmonthyear = endmonth + ' - ' + endyear;
            if(startmonth !== ''){
                document.getElementById(`monthYearDropdownStart`).value = startmonthyear;
            }
            if(endmonth !== ''){
                document.getElementById(`monthYearDropdownEnd`).value = endmonthyear;
            }
            initMonthYearPicker('Start');
            initMonthYearPicker('End');
        });
    </script>
@endsection
