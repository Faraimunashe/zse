<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                    <i data-feather="align-justify"></i>
                </a>
            </li>
            <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('assets/img/user.png')}}" class="user-img-radious-style">
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">{{Auth::user()->name}}</div>
                <a href="profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i>
                    Profile
                </a>
                <a href="timeline.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i>
                    Activities
                </a>
                <a href="#" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                </form>
                <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('dashboard')}}">
            <span class="logo-name">Stock Exchange</span>
        </a>
      </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="fas fa-chart-pie"></i>
                    <span>Home</span>
                </a>
            </li>
            @if (Auth::user()->hasRole('admin'))
                <li class="dropdown">
                    <a href="{{route('admin-brokers')}}" class="nav-link">
                        <i class="fas fa-map-marker"></i>
                        <span>Brokers</span>
                    </a>
                </li>
                {{-- <li class="dropdown">
                    <a href="{{route('admin-dividends')}}" class="nav-link">
                        <i class="fas fa-map-marker"></i>
                        <span>Dividends</span>
                    </a>
                </li> --}}
                <li class="dropdown">
                    <a href="{{route('admin-users')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                {{-- <li class="dropdown">
                    <a href="{{route('admin-news')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>News Letter</span>
                    </a>
                </li> --}}
                <li class="dropdown">
                    <a href="{{route('admin-notices')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Notices</span>
                    </a>
                </li>
            @elseif (Auth::user()->hasRole('broker'))
                <li class="dropdown">
                    <a href="{{route('broker-portifolio')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Portifolio</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('broker-add-portifolio')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Update Portifolio</span>
                    </a>
                </li>
            @elseif (Auth::user()->hasRole('user'))
                <li class="dropdown">
                    <a href="{{route('user-portifolios')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Portifolios</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('user-shares')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Shares</span>
                    </a>
                </li>
                {{-- <li class="dropdown">
                    <a href="{{route('user-dividend')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Dividend</span>
                    </a>
                </li> --}}
                <li class="dropdown">
                    <a href="{{route('user-details')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>My Details</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
