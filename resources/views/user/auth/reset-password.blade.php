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
                        <span>Reset Password</span>
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
                        <h2>Reset Password</h2>
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="group-input">
                                <label for="username">Email</label>
                                <input type="email" name="email" id="username" value="{{ old('email') }}">
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
                            <button type="submit" class="site-btn register-btn">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    @include('user.partials.authScripts')
</body>

</html>
