@extends('layouts.master')

@section('css')
    {{-- <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css  ') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css ') }}"> --}}
    {{-- <link rel="stylesheet" href="http://localhost/pdmp/css/fancytree/skin-win8/ui.fancytree.min.css"> --}}
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
                                            <div id="tree" class="fancytree">
                                                <ul class="ui-fancytree fancytree-container" tabindex="0">

                                                    <li class=""><span
                                                            class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span
                                                                class="fancytree-icon"></span><span
                                                                class="fancytree-title">Liquid Bulk</span></span>
                                                        <ul>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox">
                                                                    <span class="fancytree-icon"></span><span
                                                                        class="fancytree-title">POL-Crude</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">POL-Products</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">LPG or LNG</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Edible Oil</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">FRM-Liquid</span></span>
                                                            </li>
                                                            <li class="fancytree-lastsib"><span
                                                                    class="fancytree-node fancytree-expanded fancytree-lastsib fancytree-selected fancytree-exp-nl fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Other Liquids</span></span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class=""><span
                                                            class="fancytree-node  fancytree-focused fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span
                                                                class="fancytree-icon"></span><span
                                                                class="fancytree-title">Dry Bulk</span></span>
                                                        <ul>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Iron Ore All</span></span>
                                                                <ul>
                                                                    <li class=""><span
                                                                            class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                                class="fancytree-expander fancytree-expander-fixed"></span><input
                                                                                type="checkbox"><span
                                                                                class="fancytree-icon"></span><span
                                                                                class="fancytree-title">Pellets</span></span>
                                                                    </li>
                                                                    <li class="fancytree-lastsib"><span
                                                                            class="fancytree-node fancytree-expanded fancytree-lastsib fancytree-selected fancytree-exp-nl fancytree-ico-e"><span
                                                                                class="fancytree-expander fancytree-expander-fixed"></span><input
                                                                                type="checkbox"><span
                                                                                class="fancytree-icon"></span><span
                                                                                class="fancytree-title">Fine</span></span>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Other Ores</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Thermal Coal</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Coking Coal</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Other Coal</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Fertilizer</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">FRM-Dry</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Food Grains-excluding
                                                                        pulses</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Pulses</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Sugar</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Cement</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Salt</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Iron Scrap</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Other Dry
                                                                        Bulk</span></span></li>
                                                            <li class="fancytree-lastsib"><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-lastsib fancytree-exp-nl fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Scrap - LDT</span></span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class=""><span
                                                            class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span
                                                                class="fancytree-icon"></span><span
                                                                class="fancytree-title">Break Bulk</span></span>
                                                        <ul>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Iron and
                                                                        Steel</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Timber and
                                                                        Log</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Tea and
                                                                        Coffee</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Food Grains-excluding
                                                                        pulses</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Pulses</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Sugar</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Cement</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Project Cargo</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Fertilizer</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Automobiles-Tonnes</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Other Break
                                                                        Bulk</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Chemicals</span></span>
                                                            </li>
                                                            <li class="fancytree-lastsib"><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-lastsib fancytree-exp-nl fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Building
                                                                        Materials</span></span></li>
                                                        </ul>
                                                    </li>
                                                    <li class=""><span
                                                            class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span
                                                                class="fancytree-icon"></span><span
                                                                class="fancytree-title">Container</span></span>
                                                        <ul>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">TEUs</span></span></li>
                                                            <li class="fancytree-lastsib"><span
                                                                    class="fancytree-node fancytree-expanded fancytree-lastsib fancytree-selected fancytree-exp-nl fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Tonnes</span></span></li>
                                                        </ul>
                                                    </li>
                                                    <li class="fancytree-lastsib"><span
                                                            class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-ef"><span
                                                                class="fancytree-icon"></span><span
                                                                class="fancytree-title">Transhippment</span></span>
                                                        <ul>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Container
                                                                        Tonnes</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Other
                                                                        Transhipment</span></span></li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">POL-Crude</span></span>
                                                            </li>
                                                            <li class=""><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-exp-n fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">Container
                                                                        TEUs</span></span></li>
                                                            <li class="fancytree-lastsib"><span
                                                                    class="fancytree-node fancytree-expanded fancytree-selected fancytree-lastsib fancytree-exp-nl fancytree-ico-e"><span
                                                                        class="fancytree-expander fancytree-expander-fixed"></span>
                                                                    <input type="checkbox"><span
                                                                        class="fancytree-icon"></span><span
                                                                        class="fancytree-title">POL-Products</span></span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">

                        <!-- /.card -->

                        <div class="card">
                            <!-- /.card-header -->

                            <div class="card-body">
                                {{-- Form Respone --}}
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
                                            type="" id="PortCommoditiesStructureCreatedByUserId"
                                            required="required" aria-required="true"></div>
                                    <div class="input  required" aria-required="true"><label
                                            for="PortCommoditiesStructureDataTableTypeId">Data Table Type</label><input
                                            name="data[PortCommoditiesStructure][data_table_type_id]" value="1"
                                            data-validate="{&quot;messages&quot;:{&quot;max&quot;:&quot;Data table type id is out of range.&quot;},&quot;required&quot;:true,&quot;number&quot;:true,&quot;min&quot;:1,&quot;max&quot;:4294967295}"
                                            type="" id="PortCommoditiesStructureDataTableTypeId"
                                            required="required" aria-required="true"></div>

                                    <div class="box-footer text-center">
                                        <button type="submit" class="btn btn-primary"
                                            id="addprojectactivitysubmit">Create Selected Item List</button>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
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
    {{-- <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js ') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js ') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js ') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js ') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js ') }}"></script> --}}
    <script src="{{ asset('backend/fancytree/js/jquery.fancytree-all.min.js ') }}"></script>
    <!-- Page specific script -->
    {{-- <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script> --}}
@endsection
