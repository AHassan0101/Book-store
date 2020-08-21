@extends('layouts.master')
@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active">{{ $book->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row  mb--60">
                <div class="col-lg-5 mb--30">
                    <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>

                        @foreach($book->images as $bookImage)
                            <div class="single-slide">
                                <img src="{{ URL::to($bookImage->image) }}" alt="">
                            </div>
                        @endforeach
                    </div>

                    <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
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
                        @foreach($book->images as $bookImage)
                            <div class="single-slide">
                                <img src="{{ URL::to($bookImage->image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product-details-info pl-lg--30 ">
                        <p class="tag-block">Categories:
                            @foreach($book->categories as $bookCategory)
                                <a href="#">{{ $bookCategory->name }}</a>
                                @if(!$loop->last) , @endif
                            @endforeach
                        </p>
                        <h3 class="product-title">{{ $book->name }}</h3>
                        <ul class="list-unstyled">
                            <li>Author: <span class="list-value"> {{ $book->author }}</span></li>
                            <li>Availability: <span class="list-value">
                                    @if($book->stock > 0)
                                        In Stock
                                    @else
                                        Out of Stock
                                    @endif
                                </span></li>
                        </ul>
                        <div class="price-block">
                            <span class="price-new">£{{ $book->price }}</span>
                        </div>
                        <div class="add-to-cart-row">
                            <div class="count-input-block">
                                <span class="widget-label">Qty</span>
                                <input type="number" class="form-control text-center" value="1">
                            </div>
                            <div class="add-cart-btn">
                                <a class="btn btn-outlined--primary @if($book->stock <= 0) disabled @endif"
                                   @if($book->stock > 0) onclick="addToCart({{ $book->id }})" @endif><span
                                        class="plus-icon">+</span>Add to
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('components.add-to-cart')
@stop
