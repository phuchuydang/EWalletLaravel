@extends('layouts.app')
@section('title', 'Home')
@section('content')
<section class="hero-area">
    <div class="hero-slides owl-carousel">

        <!-- Single Hero Slide -->
        <div class="single-hero-slide">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-md-7">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Take a step into the <span>Crypto World</span></h2>
                            <h6 data-animation="fadeInUp" data-delay="400ms">Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar.</h6>
                            <a href="#" class="btn cryptos-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="hero-slides-thumb" data-animation="fadeInUp" data-delay="1000ms">
                            <img src="{{asset('image/bg-img/bg-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Slide -->
        <div class="single-hero-slide">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-md-7">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Take a step into the <span>Crypto World</span></h2>
                            <h6 data-animation="fadeInUp" data-delay="400ms">Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar.</h6>
                            <a href="#" class="btn cryptos-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="hero-slides-thumb" data-animation="fadeInUp" data-delay="1000ms">
                            <img src="{{asset('image/bg-img/bg-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection