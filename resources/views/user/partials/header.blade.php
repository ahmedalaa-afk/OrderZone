<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    hello.colorlib@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +65 11.188.888
                </div>
            </div>
            <div class="ht-right d-flex align-items-center justify-content-between">
                <div class="btn-group">
                    <button class="btn btn-transparent btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-user"></i>
                        User
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profiel</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-transparent dropdown-item">Logout</button>
                            </form>
                        </li>

                    </ul>
                </div>

                <!-- Language selector -->
                <div class="lan-selector me-3">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="{{ asset('img') }}/flag-1.jpg" data-imagecss="flag yt"
                            data-title="English">English</option>
                        <option value='yu' data-image="{{ asset('img') }}/flag-2.jpg" data-imagecss="flag yu"
                            data-title="Bangladesh">German</option>
                    </select>
                </div>

                <!-- Social icons -->
                <div class="top-social d-flex">
                    <a href="#" class="me-2"><i class="ti-facebook"></i></a>
                    <a href="#" class="me-2"><i class="ti-twitter-alt"></i></a>
                    <a href="#" class="me-2"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="{{route('user.index')}}">
                            <img src="{{ asset('img') }}/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    @livewire('user.categories-search')
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="{{route('user.wishlist.index')}}">
                                <i class="icon_heart_alt"></i>
                                <span>{{ Auth::user()->wishlist ? Auth::user()->wishlist->products->count() : 0 }}</span>

                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>
                                    @if (isset(Auth::user()->carts))
                                    {{count(Auth::user()->carts)}}
                                    @endif
                                </span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            @if (isset(Auth::user()->carts))
                                            @foreach (Auth::user()->carts as $cart)
                                            <tr>
                                                <td class="si-pic"><img
                                                        src="{{Storage::url($cart->product->photos->first()->photo)}}"
                                                        alt="" width="100"></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>${{$cart->product->total}}</p>
                                                        <h6>{{$cart->product->title}}</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>${{$total}}</h5>
                                </div>
                                <div class="select-button">
                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">${{$total}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        @foreach ($departments as $department)
                        <li>
                            <a href="{{route('user.getdepartmentProducts', ['department' => $department->name ])}}">{{
                                str($department->name)->replace('-', ' ')->title() }}</a>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="@yield('active-home')"><a href="{{ route('user.index') }}">Home</a></li>
                    <li class="@yield('active-shop')"><a href="{{ route('user.shop') }}">Shop</a></li>
                    <li @yield('active-contact')><a href="{{ route('user.contact') }}">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->