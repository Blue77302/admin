<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <!-- Logo -->
        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-text">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <img src="{{Vite::asset('resources/images/NET-TRUST-TT_200x.avif')}}"
                             class="navbar-logo logo-light"
                             alt="logo" style="width: 80%">
                    </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Logo -->
        @if (!Request::is('collapsible-menu/*'))
            <div class="profile-info">
                <div class="user-info">
                    <div class="profile-img">
                        <img src="{{Vite::asset('resources/images/profile-30.png')}}" alt="avatar">
                    </div>
                    <div class="profile-content">
                        <h6 class="">{{ auth()->user()->name }}</h6>
                        <p class="text-capitalize">{{ auth()->user()->roles()->first()->name }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="menu-nav-bar">
            @foreach($menuItems as $menuItem)
                @if ($menuItem['show'])
                    <li class="menu {{ $menuItem['active'] ? 'active' : '' }}">
                        <a href="{{ $menuItem['child'] ? '#item' . $loop->index : $menuItem['url'] }}"
                           {{ $menuItem['child'] ? 'data-bs-toggle="collapse"' : '' }}
                           aria-expanded="{{ $menuItem['child'] ? 'true' : 'false' }}"
                           class="dropdown-toggle">
                            <div class="">
                                <i data-feather="{{ $menuItem['icon'] }}"></i>
                                <span>Dashboard</span>
                            </div>
                            @if ($menuItem['child'])
                                <div>
                                    <i data-feather="chevron-right"></i>
                                </div>
                            @endif
                        </a>
                        @if ($menuItem['child'])
                            <ul class="collapse submenu list-unstyled {{ $menuItem['active'] ? 'show' : '' }}"
                                id="{{ 'item' . $loop->index }}" data-parent="#accordionExample">
                                @foreach ($menuItem['child'] as $menuItemChild)
                                    @if ($menuItemChild['show'])
                                        <li class="{{ $menuItemChild['active'] ? 'active' : '' }}">
                                            <a href="{{ $menuItemChild['url'] }}"> {{ $menuItemChild['title'] }} </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
