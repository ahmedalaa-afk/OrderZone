<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        @include('admin.partials.authLogo')

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @yield('home-active')">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-home-circle' undefined></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        {{-- Super Admin --}}
        @role('super_admin', 'admin')
        <li class="menu-item @yield('settings-active')">
            <a href="{{ route('admin.settings') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-cog' undefined></i>
                <div data-i18n="Analytics">Settings</div>
            </a>
        </li>
        @endrole
        {{-- User Manager --}}
        @role('user_manager', 'admin')
        <li class="menu-item mt-3 @yield('users-active')">
            <a href="{{ route('admin.users') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-group bx-tada-hover' undefined></i>
                <div data-i18n="Analytics">Users</div>
            </a>
        </li>
        @endrole
        {{-- Vendor Manager --}}
        @role('vendor_manager', 'admin')
        <li class="menu-item mt-3 @yield('vendors-active')">
            <a href="{{ route('admin.vendors') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-group' undefined></i>
                <div data-i18n="Analytics">Vendors</div>
            </a>
        </li>
        @endrole
        @role('vendor_manager','admin')
        <li class="menu-item mt-3 @yield('notifications-active')">
            <a href="{{ route('admin.notifications') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-bell-ring bx-tada-hover' undefined></i>
                <div data-i18n="Analytics" class="notification" id="notification-item">
                    Registration Requests <span id="notification-counter" class="text-danger">
                        @if (count(Auth::guard('admin')->user()->unreadNotifications) > 0)
                        +{{count(Auth::guard('admin')->user()->unreadNotifications)}}
                        @endif
                    </span>
                </div>
            </a>
        </li>
        @endrole
        {{-- Product Manage --}}
        @role('product_manager', 'admin')
        <li class="menu-item mt-3 @yield('products-active')">
            <a href="{{ route('admin.products') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-bell-ring bx-tada-hover' undefined></i>
                <div data-i18n="Analytics" class="notification" id="product-notification-item">
                    Vendor Requests <span id="notification-counter" class="text-danger">
                        @if (count(Auth::guard('admin')->user()->unreadNotifications) > 0)
                        +{{count(Auth::guard('admin')->user()->unreadNotifications)}}
                        @endif
                    </span>
                </div>
            </a>
        </li>
        @endrole
        @role('product_manager', 'admin')
        <li class="menu-item mt-3 @yield('categories-active')">
            <a href="{{ route('admin.categories') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-category'></i>
                <div data-i18n="Analytics">Categories</div>
            </a>
        </li>
        @endrole
    </ul>
</aside>
<!-- / Menu -->