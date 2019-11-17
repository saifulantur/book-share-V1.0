@extends('layouts.frontendapp')
@section('header_class_col', 'col-md-6 col-sm-6 col-6 col-lg-2')
@section('slider-area')
    <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        <!-- Start Single Slide -->
        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider__content">
                            <div class="contentbox">
                                <h2>share <span>your </span></h2>
                                <h2><span>Book </span></h2>
                                <h2>in <span>Here </span></h2>
                                <a class="shopbtn" href="#">share your book</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider__content">
                            <div class="contentbox">
                                <h2>share <span>your </span></h2>
                                <h2><span>Book </span></h2>
                                <h2>from <span>Here </span></h2>
                                <a class="shopbtn" href="#">share your book</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
    @endsection
@section('frontend_content')

    @include('frontend.partials.new-ads')
    @include('frontend.partials.stay-with-us')
    @include('frontend.partials.feature-ads')
    @include('frontend.partials.help-me')
    @include('frontend.partials.free-books')

@endsection
