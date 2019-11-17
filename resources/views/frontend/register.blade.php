@extends('layouts.frontendapp')
@section('header_class', 'oth-page')
@section('header_class_col', 'col-md-6 col-sm-6 col-6 col-lg-2')
@section('frontend_content')
    @include('layouts.frontend-partials.bradcaump')

    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6 col-12">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Register</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="account__form">
                                <div class="input__box">
                                    <label>Name<span>*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Email address <span>*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Phone Number<span>*</span></label>
                                    <input id="phone" type="text" name="phone">
                                </div>
                                <div class="input__box">
                                    <label>Password<span>*</span></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Confirm Password<span>*</span></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="form__btn">
                                    <button type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
