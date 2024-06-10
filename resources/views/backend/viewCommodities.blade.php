@extends('layouts.master')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/fancytree/skin-win8/ui.fancytree.min.css  ') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Commodities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Commodities</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <tbody>
                                            @php
                                                // Port Category
                                                $portCat = \App\Models\PortCategory::where('id', $userData->port_type)
                                                    ->select('category_name')
                                                    ->first();

                                                // State ID
                                                $portState = \App\Models\State::where('id', $userData->state_id)
                                                    ->select('name')
                                                    ->first();

                                                // State Board ID
                                                $portStateBoard = \App\Models\StateBoard::where(
                                                    'id',
                                                    $userData->state_board,
                                                )
                                                    ->select('name')
                                                    ->first();

                                                // Port Category
                                                $port = \App\Models\Port::where('id', $userData->port_id)
                                                    ->select('port_name')
                                                    ->first();
                                            @endphp
                                            <tr>
                                                <th>State Name:</th>
                                                <td>{{ $portState ? $portState->name : 'N/A' }}</td>

                                                <th>Port Type:</th>
                                                <td>{{ $portCat ? $portCat->category_name : 'N/A' }}</td>

                                                <th>State Board</th>
                                                <td>{{ $portStateBoard ? $portStateBoard->name : 'N/A' }}</td>

                                                <th>Port Name:</th>
                                                <td>{{ $port ? $port->port_name : 'N/A' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <!-- /.card -->
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- Form Respone --}}
                                <div class="box box-info">
                                    <div class="box-header">
                                        <h4 class="box-title">Select Commodity<span class="asterisk">* </span></h4>
                                    </div>
                                    <div class="box-body">
                                        {{-- Form Respone --}}
                                        <div id="tree" class="fancytree">
                                            <ul class="ui-fancytree fancytree-container" tabindex="0">

                                                @foreach ($commodityArr as $commodityData)
                                                    @foreach ($commodityData['sub'] as $subCommodity)
                                                        <li class=""><span
                                                                class="fancytree-node  fancytree-focused fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span
                                                                    class="fancytree-icon"></span><span
                                                                    class="fancytree-title">{{ $subCommodity['sub']['name'] }}</span></span>
                                                            <ul>
                                                                @foreach ($subCommodity['innersub'] as $innerKey => $innerSubData)
                                                                    @if (!empty($innerSubData['innermostsub']))
                                                                        <li class=""><span
                                                                                class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span
                                                                                    class="fancytree-expander fancytree-expander-fixed"></span><span
                                                                                    class="fancytree-icon"></span><span
                                                                                    class="fancytree-title">{{ $innerSubData['innersub']['name'] }}</span></span>
                                                                            <ul>
                                                                                @foreach ($innerSubData['innermostsub'] as $innerSubMostData)
                                                                                    @php
                                                                                        if (
                                                                                            $innerSubMostData[
                                                                                                'port_id'
                                                                                            ] != 0
                                                                                        ) {
                                                                                            $expPortIdArr = explode(
                                                                                                ',',
                                                                                                $innerSubMostData[
                                                                                                    'port_id'
                                                                                                ],
                                                                                            );
                                                                                            $userPortId = auth()->user()
                                                                                                ->port_id;
                                                                                            $portProvide = 0;
                                                                                            if (
                                                                                                in_array(
                                                                                                    $userPortId,
                                                                                                    $expPortIdArr,
                                                                                                )
                                                                                            ) {
                                                                                                $portProvide = 1;
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                    <li class=""
                                                                                        onClick="CommodityAllocate('{{ $innerSubMostData['id'] }}');">
                                                                                        <span
                                                                                            class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                                                class="fancytree-expander fancytree-expander-fixed"></span><input
                                                                                                type="checkbox"
                                                                                                @if (isset($portProvide) && $portProvide == 1) checked @endif><span
                                                                                                class="fancytree-icon"></span><span
                                                                                                class="fancytree-title">{{ $innerSubMostData['name'] }}</span></span>
                                                                                    </li>
                                                                                    @php
                                                                                        $portProvide = 0;
                                                                                    @endphp
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                    @endif

                                                                    @if (empty($innerSubData['innermostsub']))
                                                                        @php
                                                                            if (
                                                                                $innerSubData['innersub']['port_id'] !=
                                                                                0
                                                                            ) {
                                                                                $expPortIdArr = explode(
                                                                                    ',',
                                                                                    $innerSubData['innersub'][
                                                                                        'port_id'
                                                                                    ],
                                                                                );
                                                                                $userPortId = auth()->user()->port_id;
                                                                                $portProvide = 0;
                                                                                if (
                                                                                    in_array($userPortId, $expPortIdArr)
                                                                                ) {
                                                                                    $portProvide = 1;
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        <li class=""
                                                                            onClick="CommodityAllocate('{{ $innerSubData['innersub']['id'] }}');">
                                                                            <span
                                                                                class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                                    class="fancytree-expander fancytree-expander-fixed"></span>
                                                                                <input type="checkbox"
                                                                                    @if (isset($portProvide) && $portProvide == 1) checked @endif><span
                                                                                    class="fancytree-icon"></span><span
                                                                                    class="fancytree-title">{{ $innerSubData['innersub']['name'] }}</span></span>
                                                                        </li>
                                                                        @php
                                                                            $portProvide = 0;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    {{-- <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="box box-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-header">
                                                <h4 class="box-title">Creating Commodity Data Entry Form for your Port</h4>
                                                <div class="asteriskLine"> Fields marked with * are mandatory.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input  required" aria-required="true"><label
                                            for="ProjectActivityParentActivity">Commodity</label><input
                                            name="data[PortCommoditiesStructure][commodity_id]"
                                            id="ProjectActivityParentActivity"
                                            data-validate="{&quot;messages&quot;:{&quot;max&quot;:&quot;Commodity id is out of range.&quot;},&quot;required&quot;:true,&quot;number&quot;:true,&quot;min&quot;:1,&quot;max&quot;:4294967295}"
                                            type="" required="required" aria-required="true"></div>
                                    <div class="input  required" aria-required="true"><label
                                            for="PortCommoditiesStructureCreatedByUserId">Created By User</label><input
                                            name="data[PortCommoditiesStructure][created_by_user_id]" value="45"
                                            data-validate="{&quot;messages&quot;:{&quot;min&quot;:&quot;Created by user id is required.&quot;},&quot;required&quot;:true,&quot;min&quot;:1}"
                                            type="" id="PortCommoditiesStructureCreatedByUserId" required="required"
                                            aria-required="true"></div>
                                    <div class="input  required" aria-required="true"><label
                                            for="PortCommoditiesStructureDataTableTypeId">Data Table Type</label><input
                                            name="data[PortCommoditiesStructure][data_table_type_id]" value="1"
                                            data-validate="{&quot;messages&quot;:{&quot;max&quot;:&quot;Data table type id is out of range.&quot;},&quot;required&quot;:true,&quot;number&quot;:true,&quot;min&quot;:1,&quot;max&quot;:4294967295}"
                                            type="" id="PortCommoditiesStructureDataTableTypeId" required="required"
                                            aria-required="true"></div>

                                    <div class="box-footer text-center">
                                        <button type="submit" class="btn btn-primary" id="addprojectactivitysubmit">Create
                                            Selected Item List</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!--  -->
    </div>
    <!-- /.content-wrapper -->

    <!-- MODAL -->
    <!-- /.modal -->
@endsection

@section(' js')
    <!-- jQuery -->
    <script src="{{ asset('backend/fancytree/js/jquery.fancytree-all.min.js ') }}"></script>
    {{-- <script src="{{ asset('backend/js/commodityAllocate.js ') }}"></script>
    <!-- Page specific script -->
    <script>
        function CommodityAllocate(id){
            // alert(id);
            $.ajax({
                type: "GET",
                url: "/commodity-allocate/" + id,
                // If you need to pass additional data, you can use the data property like this:
                // data: { key1: value1, key2: value2 },
                success: function(response) {
                    alert(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle errors here
                }
            });
        }
    </script> --}}
    {{-- <!-- Your custom JavaScript code -->
    <script>
        $(document).ready(function() {
            var successMessage = '{{ session('success') }}';
            if (successMessage) {
                // Display success message using alert or any other UI component
                alert(successMessage);
            }
        });
    </script> --}}
@endsection
