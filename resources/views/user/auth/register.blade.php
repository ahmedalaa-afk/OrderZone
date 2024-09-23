<!DOCTYPE html>
<html lang="zxx">

@include('user.partials.authHead')

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="group-input">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{old('name')}}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{old('email')}}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="group-input">
                                <label for="pass">Password</label>
                                <input type="password" name="password" id="pass">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="con-pass">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('login') }}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    @include('user.partials.authScripts')
</body>

</html>
