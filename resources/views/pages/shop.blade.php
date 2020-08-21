@extends('layouts.master')
@section('content')
    <style>
        .page-item.active .page-link {
            border: 2px solid #62ab00;
            color: #555;
            background-color: #fff;
        }

        .page-link {
            width: 54px;
            height: 48px;
            color: #555;
            background: none;
            font-size: 16px;
            border: none;
            padding: 0;
            font-weight: 600;
            border-radius: 0;
            -webkit-border-radius: 0;
            line-height: 48px;
            position: relative;
            text-align: center;
        }
    </style>
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2">
                    <div class="shop-toolbar with-sidebar mb--30">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="product-view-mode">
                                    <a href="#" class="sorting-btn active" data-target="grid"><i
                                            class="fas fa-th"></i></a>
                                    <a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
                                    </a>
                                    <a href="#" class="sorting-btn" data-target="list "><i
                                            class="fas fa-list"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6  mt--10 mt-sm--0" style="text-align: end">
									<span class="toolbar-status">
										Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->currentPage() }} (2 Pages)
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="shop-toolbar d-none">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="product-view-mode">
                                    <a href="#" class="sorting-btn active" data-target="grid"><i
                                            class="fas fa-th"></i></a>
                                    <a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
                                    </a>
                                    <a href="#" class="sorting-btn" data-target="list "><i
                                            class="fas fa-list"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6  mt--10 mt-sm--0" style="text-align: end">
									<span class="toolbar-status">
										Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->currentPage() }} (2 Pages)
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
                        @foreach($books as $book)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-card">
                                    <div class="product-grid-content">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                {{ $book->author }}
                                            </a>
                                            <p class="tag-block">Categories:
                                                @foreach($book->categories as $bookCategory)
                                                    <a href="#">{{ $bookCategory->name }}</a>
                                                    @if(!$loop->last) , @endif
                                                @endforeach
                                            </p>
                                            <h3><a href="{{ route('book.details', $book->slug) }}">{{ $book->name }}</a>
                                            </h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="{{ URL::to($book->image) }}" alt="">
                                                <div class="hover-contents">
                                                    <a href="{{ route('book.details', $book->slug) }}"
                                                       class="hover-image">
                                                        <img src="{{ URL::to($book->images[0]->image) }}" alt="">
                                                    </a>
                                                    <div class="hover-btns">
                                                        <a href="{{ route('cart') }}"
                                                           class="single-btn @if($book->stock <= 0) disabled @endif">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>
                                                        {{--                                                        <a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                        {{--                                                           class="single-btn">--}}
                                                        {{--                                                            <i class="fas fa-eye"></i>--}}
                                                        {{--                                                        </a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">£{{ $book->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-list-content">
                                        <div class="card-image">
                                            <img src="{{ URL::to($book->image) }}" alt="">
                                        </div>
                                        <div class="product-card--body">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    {{ $book->author }}
                                                </a>
                                                <h3><a href="{{ route('book.details', $book->slug) }}"
                                                       tabindex="0">{{ $book->name }}</a>
                                                </h3>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">£{{ $book->price }}</span>
                                            </div>
                                            <div class="btn-block">
                                                <a class="btn btn-outlined @if($book->stock <= 0) disabled @endif"
                                                   @if($book->stock > 0) onclick="addToCart({{ $book->id }})" @endif>Add
                                                    To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row pt--30">
                        <div class="col-md-12">
                            <div class="pagination-block">
                                <ul class="pagination-btns flex-center">
                                    <li>{{ $books->render() }}<a href="#" class=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  mt--40 mt-lg--0">
                    <div class="inner-page-sidebar">
                        <div class="single-block">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="sidebar-menu--shop">
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category->name }} ({{ $category->books_count }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('components.add-to-cart')
@stop
