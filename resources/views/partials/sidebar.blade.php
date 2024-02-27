<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('backend/images/emblem.png ') }}" alt="Emblem Of India"
            class="brand-image img-circle elevation-3" style="opacity: .8; background: #fff;">
        <span class="brand-text font-weight-light "><b>PDMP 2.0 </b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user.jpg ') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <p class="text-muted m-0 d-block">({{ getUserName() }})</p>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-legacy nav-flat flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->

                @foreach ($panelDataByRole as $key => $value)
                    <li class="nav-item">
                        {{-- {{ dd($panelDataByRole) }} --}}
                        @if (!in_array($value['module_name'], ['Report', 'Monthly Exp', 'BE', 'RE', 'Monthly Exp Add']))
                            <a href="{{ route('backend.' . $value['url']) }}" class="nav-link">
                                {{-- <a href="{{ route('backend.view-major-non-major-port-capacity') }}" class="nav-link"> --}}
                                <i class="nav-icon fas {{ $value['icon'] }}"></i>
                                <p>
                                    {{ $value['module_name'] }}
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        @else
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon fas {{ $value['icon'] }}"></i>
                                <p>
                                    {{ $value['module_name'] }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        @endif
                        {{-- @if (isset($value['submodule']))
                            <ul class="nav nav-treeview">
                                @foreach ($value['submodule'] as $subModKey => $subModVal)
                                    <li class="nav-item">
                                        <a href="{{ route('backend.' . $subModVal['url']) }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            {{ $subModVal['module_name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif --}}

                    </li>
                @endforeach
                {{-- <li class="nav-item">
                    <a href="{{ route('viewMajorNonMajorPortCapacity') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>MNM Ports & Capacities</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewBerthRelatedInformation') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Bearth Related Information</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewDirectPortEntryDeliveryRelatedContainers') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>DPE & Delivery Related To Containers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewEmploymentMajorPorts') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Employment Major Ports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewEmploymentDockLabourBoardsMajorPort') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Employment Dock Labour Boards Major Port</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewCruiseTourism') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Cruise Tourism</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewNationalWaterwaysInformation') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>National Waterways Information</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewIndianTonnage') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Indian Tonnage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('viewSeafarersInformation') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Seafarers Information</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Logout</p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
