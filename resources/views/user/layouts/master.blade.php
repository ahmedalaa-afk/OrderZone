<!DOCTYPE html>
<html lang="zxx">

@include('user.partials.head')

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('user.partials.header')

    @yield('content')

    @include('user.partials.partner')

    @include('user.partials.footer')

    @include('user.partials.scripts')
</body>

</html>