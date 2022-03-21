<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu page-header-fixed slimscroll-style" data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img alt="image" src="{{asset('assets/img/admin.png')}}">
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-role" style="font-weight: bold">Administrator</div>
                        </div>
                    </div>
                </li>
                <li class="nav-item start active">
                    <a href="{{ route('home') }}" class="nav-link nav-toggle">
                        <i data-feather="airplay"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item {{ return_if(on_page('group.index') or on_page('group.create') , ' active open') }}">
                    <a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
                        <span class="title">Groups</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('group.create'), ' active') }}"
                               href="{{ route('group.create') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Add Group</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('group.index'), ' active') }}"
                               href="{{ route('group.index') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Groups</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ return_if(on_page('device.index') or on_page('device.create') , ' active open') }}">
                    <a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
                        <span class="title">Devices</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('device.create'), ' active') }}"
                               href="{{ route('device.create') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Add Device</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('device.index'), ' active') }}"
                               href="{{ route('device.index') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Devices</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ return_if(on_page('users.index') or on_page('users.create') , ' active open') }}">
                    <a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
                        <span class="title">Customers</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('users.create'), ' active') }}"
                               href="{{ route('users.create') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Add Customer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('users.index'), ' active') }}"
                               href="{{ route('users.index') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Customers</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ return_if(on_page('roles.index') or on_page('roles.create') , ' active open') }}">
                    <a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
                        <span class="title">Roles</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('roles.create'), ' active') }}"
                               href="{{ route('roles.create') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Add Role</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ return_if(on_page('roles.index'), ' active') }}"
                               href="{{ route('roles.index') }}">
                                <i class="icon-plus"></i>
                                <span class="title">Roles</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
                        <span class="title">Statistics</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">

                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
