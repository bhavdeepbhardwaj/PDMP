@extends('layouts.master')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/fancytree/skin-win8/ui.fancytree.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Vessel Wise Phy Performance</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Vessel Wise Phy Performance</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Vessel Wise Phy Performance</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <tbody>
                                    @php
                                        $portCat = \App\Models\PortCategory::where('id', $userData->port_type)
                                            ->select('category_name')
                                            ->first();
                                        $portState = \App\Models\State::where('id', $userData->state_id)
                                            ->select('name')
                                            ->first();
                                        $portStateBoard = \App\Models\StateBoard::where('id', $userData->state_board)
                                            ->select('name')
                                            ->first();
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
                    <!-- /.col -->
                    <div class="col-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="box box-info">
                                    <div class="box-header">
                                        <h4 class="box-title">Select Vessel Wise Phy Performance<span class="asterisk">* </span></h4>
                                    </div>
                                    <div class="box-body">
                                        <div id="tree" class="fancytree">
                                            <ul class="ui-fancytree fancytree-container" tabindex="0">
                                                @foreach ($commodityArr as $commodityData)
                                                    @foreach ($commodityData['sub'] as $subCommodity)
                                                        <li>
                                                            <span
                                                                class="fancytree-node fancytree-focused fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
                                                                <span class="fancytree-icon"></span>
                                                                <span
                                                                    class="fancytree-title">{{ $subCommodity['sub']['name'] }}</span>
                                                            </span>
                                                            <ul>
                                                                @foreach ($subCommodity['innersub'] as $innerKey => $innerSubData)
                                                                    @if (!empty($innerSubData['innermostsub']))
                                                                        <li>
                                                                            <span
                                                                                class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
                                                                                <span
                                                                                    class="fancytree-expander fancytree-expander-fixed"></span>
                                                                                <span class="fancytree-icon"></span>
                                                                                <span
                                                                                    class="fancytree-title">{{ $innerSubData['innersub']['name'] }}</span>
                                                                            </span>
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
                                                                                    <li
                                                                                        onClicks="CommodityAllocate('{{ $innerSubMostData['id'] }}');">
                                                                                        <span
                                                                                            class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e">
                                                                                            <span
                                                                                                class="fancytree-expander fancytree-expander-fixed"></span>
                                                                                            <input type="checkbox"
                                                                                                @if (isset($portProvide) && $portProvide == 1) checked @endif>
                                                                                            <span
                                                                                                class="fancytree-icon"></span>
                                                                                            <span
                                                                                                class="fancytree-title">{{ $innerSubMostData['name'] }}</span>
                                                                                        </span>
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
                                                                        <li
                                                                            onClicks="CommodityAllocate('{{ $innerSubData['innersub']['id'] }}');">
                                                                            <span
                                                                                class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e">
                                                                                <span
                                                                                    class="fancytree-expander fancytree-expander-fixed"></span>
                                                                                <input type="checkbox"
                                                                                    @if (isset($portProvide) && $portProvide == 1) checked @endif>
                                                                                <span class="fancytree-icon"></span>
                                                                                <span
                                                                                    class="fancytree-title">{{ $innerSubData['innersub']['name'] }}</span>
                                                                            </span>
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
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/fancytree/js/jquery.fancytree-all.min.js') }}"></script>
@endsection
