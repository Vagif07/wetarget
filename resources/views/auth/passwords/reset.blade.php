@extends('layouts.app')

@section('content')
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{route('home')}}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access the WeTarget panel using your email and password.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-bordered">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title">Reset password</h5>
                                                <div class="nk-block-des">
                                                    <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">{{ __('E-Mail Address') }}</label>
                                                </div>
                                                <input type="email" name="email" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password-confirm">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password-confirm" placeholder="Confirm your password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-lg btn-primary btn-block">{{ __('Reset Password') }}</button>
                                            </div>
                                        </form>
                                        <div class="form-note-s2 text-center pt-4">
                                            <a href="{{route('login')}}"><strong>Return to login</strong></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('partials.auth.footer')
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
@endsection
