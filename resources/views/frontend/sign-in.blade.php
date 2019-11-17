@extends('layouts.frontendapp')
@section('header_class', 'oth-page')
@section('header_class_col', 'col-md-6 col-sm-6 col-6 col-lg-2')
@section('frontend_content')
   @include('layouts.frontend-partials.bradcaump')
    <!-- Start My Account Area -->
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6 col-12">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Login</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="account__form">
                                <div class="input__box">
                                    <label>Email address <span>*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Password<span>*</span></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form__btn">
                                    <button type="submit">Login</button>
                                    <label class="label-for-checkbox">
                                        <input id="rememberme" class="input-checkbox" name="rememberme"  type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="forget_pass" style="display: inline-block" href="{{ route('password.request') }}">Lost your password? </a>
                                @endif
                                <a class="forget_pass" style="display: inline-block; margin-left: 20px" href="{{ route('register') }}">Create New Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End My Account Area -->
    @endsection
