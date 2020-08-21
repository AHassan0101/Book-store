@extends('layouts.master')
@section('content')
    <div class="site-wrapper" id="top">
        <section class="hero-area hero-slider-3">
            <div class="sb-slick-slider"
                 data-slick-setting='{"autoplay": true,"autoplaySpeed": 8000,"slidesToShow": 1,"dots":true}'>
                <div class="single-slide bg-image  bg-overlay--dark"
                     data-bg="{{ URL::to('front-end/image/bg-images/home-3-slider-1.jpg') }}">
                    <div class="container">
                        <div class="home-content text-center">
                            <div class="row justify-content-end">
                                <div class="col-lg-6">
                                    <h1>Beautifully Designed</h1>
                                    <h2>Cover up front of book and
                                        <br>leave summary</h2>
                                    <a href="{{ route('shop') }}" class="btn btn--yellow">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide bg-image  bg-overlay--dark"
                     data-bg="{{ URL::to('front-end/image/bg-images/home-3-slider-2.jpg') }}">
                    <div class="container">
                        <div class="home-content pl--30">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1>I Love This Idea!</h1>
                                    <h2>Cover up front of book and
                                        <br>leave summary</h2>
                                    <a href="{{ route('shop') }}" class="btn btn--yellow">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt--30 section-margin">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>{{ $language->name }}</h2>
                </div>
                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                    @foreach($language->books as $languageBook)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        {{ $languageBook->author }}
                                    </a>
                                    <h3>
                                        <a href="{{ route('book.details', $languageBook->slug) }}">{{ $languageBook->name }}</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL::to($languageBook->image) }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ route('book.details', $languageBook->slug) }}"
                                               class="hover-image">
                                                <img src="{{ URL::to($languageBook->images[0]->image) }}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a onclick="addToCart({{ $languageBook->id }})" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
{{--                                                <a href="javascript:void(0)" class="single-btn viewBook"--}}
{{--                                                   onclick="viewBook({{ $languageBook->id }})">--}}
{{--                                                    <i class="fas fa-eye"></i>--}}
{{--                                                </a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£{{ $languageBook->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>{{ $business->name }}</h2>
                </div>
                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                    @foreach($business->books as $businessBook)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        {{ $businessBook->author }}
                                    </a>
                                    <h3>
                                        <a href="{{ route('book.details', $businessBook->slug) }}">{{ $businessBook->name }}</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL::to($businessBook->image) }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ route('book.details', $businessBook->slug) }}"
                                               class="hover-image">
                                                <img src="{{ URL::to($businessBook->images[0]->image) }}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a onclick="addToCart({{ $businessBook->id }})" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
{{--                                                <a href="javascript:void(0)" class="single-btn viewBook"--}}
{{--                                                   onclick="viewBook({{ $businessBook->id }})">--}}
{{--                                                    <i class="fas fa-eye"></i>--}}
{{--                                                </a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£{{ $businessBook->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>{{ $computing->name }}</h2>
                </div>
                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                    @foreach($computing->books as $computingBook)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        {{ $computingBook->author }}
                                    </a>
                                    <h3>
                                        <a href="{{ route('book.details', $computingBook->slug) }}">{{ $computingBook->name }}</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL::to($computingBook->image) }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ route('book.details', $computingBook->slug) }}"
                                               class="hover-image">
                                                <img src="{{ URL::to($computingBook->images[0]->image) }}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a onclick="addToCart({{ $computingBook->id }})" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
{{--                                                <a href="javascript:void(0)" class="single-btn viewBook"--}}
{{--                                                   onclick="viewBook({{ $computingBook->id }})">--}}
{{--                                                    <i class="fas fa-eye"></i>--}}
{{--                                                </a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£{{ $computingBook->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
             aria-labelledby="quickModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="product-details-modal">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-1.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-2.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-3.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-4.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-5.jpg') }}"
                                             alt="">
                                    </div>
                                </div>
                                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                                     data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-1.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-2.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-3.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-4.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ URL::to('front-end/image/products/product-details-5.jpg') }}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 mt--30 mt-lg--30">
                                <div class="product-details-info pl-lg--30 ">
                                    <p class="tag-block book-categories"></p>
                                    <h3 class="product-title"></h3>
                                    <ul class="list-unstyled">
                                        <li>Author: <span class="list-value author-name"></span></li>
                                        <li>Availability: <span class="list-value book-availability"></span>
                                        </li>
                                    </ul>
                                    <div class="price-block">
                                        <span class="price-new book-price"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.add-to-cart')
{{--    @include('components.view-book')--}}
@stop
