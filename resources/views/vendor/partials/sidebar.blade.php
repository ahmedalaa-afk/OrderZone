<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        @include('vendor.partials.authLogo')

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @yield('home-active')">
            <a href="{{route('vendor.index')}}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-home-circle' undefined></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @role('vendor','vendor')
        <li class="menu-item mt-3 @yield('product-active')">
            <a href="{{route('vendor.product.index')}}" class="menu-link">
                <i class="menu-icon tf-icons fa-solid fa-copy"></i>
                <div data-i18n="Analytics">Products</div>
            </a>
        </li>
        @endrole
        {{-- @role('vendor', 'vendor')
        <li class="menu-item mt-3 @yield('announcements-active')">
            <a href="{{ route('vendor.announcements') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-bell-ring bx-tada-hover' undefined></i>
                <div data-i18n="Analytics" class="notification" id="notification-item">
                    Announcements
                    <span id="notification-counter" class="text-danger">
                        @if (count(Auth::guard('vendor')->user()->unreadNotifications) > 0)
                        +{{count(Auth::guard('vendor')->user()->unreadNotifications)}}
                        @endif
                    </span>
                </div>
            </a>
        </li>
        @endrole --}}
        @role('vendor', 'vendor')
        <li class="menu-item mt-3 @yield('notifications-active')">
            <a href="{{ route('vendor.notifications') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-bell-ring bx-tada-hover' undefined></i>
                <div data-i18n="Analytics" class="notification" id="notification-item">
                    Notifications
                    <span id="notification-counter" class="text-danger">
                        @if (count(Auth::guard('vendor')->user()->unreadNotifications) > 0)
                        +{{count(Auth::guard('vendor')->user()->unreadNotifications)}}
                        @endif
                    </span>
                </div>
            </a>
        </li>
        @endrole
    </ul>
</aside>
<!-- / Menu -->