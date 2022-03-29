<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="{{route('home')}}">
                <span class="logo-icon material-icons fa-rotate-45">school</span>
                <span class="logo-default">ICMP</span> </a>
        </div>
        <!-- logo end -->
        <ul class="nav navbar-nav navbar-left in">
            <li><a href="#" class="menu-toggler sidebar-toggler"><i data-feather="menu"></i></a></li>
        </ul>

        <!-- start mobile menu -->
        <a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- start manage user dropdown -->
                <li class="dropdown dropdown-user" style="cursor:pointer;">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <span class="username username-hide-on-mobile"> {{ auth()->user()->username }} </span>
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('profile.detail') }}">
                                <i class="icon-user"></i> Profile </a>
                        </li>
                        <li>
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-logout"></i> Log Out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- end manage user dropdown -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                       data-upgraded=",MaterialButton">
                        <i class="material-icons">more_vert</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
