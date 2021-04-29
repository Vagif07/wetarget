@extends('layouts.auth.app')

@section('content')
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{route('home')}}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">{{ __('Register') }}</h4>
                                        <div class="nk-block-des">
                                            <p>{{ __('Create New WeTarget Account') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="company_name">{{ __('Company Name') }}</label>
                                        <input type="text" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus class="form-control form-control-lg" id="company_name" placeholder="Enter your company name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="website">{{ __('Company\'s Website') }}</label>
                                        <input type="url" name="website" value="{{ old('website') }}"  autocomplete="website" class="form-control form-control-lg" id="website" placeholder="Enter your company's website">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                                        <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone_number">{{ __('Company\'s Number') }}</label>
                                        <input type="text" name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number" class="form-control form-control-lg" id="phone_number" placeholder="Enter your company's phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="description">{{ __('Company\'s Description') }}</label>
                                        <textarea name="description" class="form-control no-resize form-control-lg" id="description" placeholder="Enter your company's description">{{ old('description') }}</textarea>
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
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox">
                                            <label class="custom-control-label" for="checkbox">I agree to WeTarget <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">{{ __('Register') }}</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{route('login')}}"><strong>Sign in instead</strong></a>
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
