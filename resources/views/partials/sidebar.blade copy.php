<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/images/emblem.png ') }}" alt="Emblem Of India"
            class="brand-image img-circle elevation-3" style="opacity: .8; background: #fff;">
        <span class="brand-text font-weight-light">Port App</span>
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
        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->

                @foreach ($panelDataByRole as $key => $value)
                    <li class="nav-item">
                        @if (!in_array($value['module_name'], ['Report', 'Monthly Exp']))
                            <a href="{{ route('backend.' . $value['url']) }}" class="nav-link">
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
                        <ul class="nav nav-treeview">
                            {{-- @if (in_array($value['module_name'], ['Monthly Exp', 'Report'])) --}}
                            @if (isset($value['submodule']))
                                @foreach ($value['submodule'] as $subModKey => $subModVal)
                                    <li class="nav-item">
                                        <a href="{{ route('backend.' . $subModVal['url']) }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            {{ $subModVal['module_name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                            {{-- <li class="nav-item">
                            <a href="{{ route('backend.' . $value['url']) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                RE Report
                            </a>
                        </li> --}}
                            {{-- @endif --}}
                            {{-- @if (in_array($value['module_name'], ['Report']))

                        @foreach ($value['submodule'] as $subModKey => $subModVal)
                        <li class="nav-item">
                            <a href="{{ route('backend.' . $subModVal['url']) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                {{$subModVal['module_name']}}
                            </a>
                        </li>
                        @endforeach
                        @endif --}}
                        </ul>
                    </li>
                @endforeach
            </ul>
            {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="(./index.html)" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/module.html" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Module
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/user.html" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User Management
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/role.html" class="nav-link">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Role
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/port.html" class="nav-link">
                        <i class="nav-icon fas fa-ship"></i>
                        <p>
                            Port
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/portcat.html" class="nav-link">
                        <i class="nav-icon fas fa-ship"></i>
                        <p>
                            Port Category
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/re.html" class="nav-link">
                        <i class="nav-icon fas fa-ship"></i>
                        <p>
                            RE
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/be.html" class="nav-link">
                        <i class="nav-icon fas fa-ship"></i>
                        <p>
                            BE
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/be-report.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BE Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/re-report.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RE Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Monthly Exp
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/be-monthly.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BE Monthly</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/re-monthly.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RE Monthly</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul> --}}
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
