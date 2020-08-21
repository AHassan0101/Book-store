<div class="site-header header-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 flex-lg-right">
                <ul class="header-top-list">
                    @auth
                        <li class="dropdown-trigger language-dropdown"><a href="#"><i
                                    class="icons-left fas fa-user"></i>
                                My Account</a><i class="fas fa-chevron-down dropdown-arrow"></i>
                            <ul class="dropdown-box">
                                <li>
                                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       href="{{ route('logout') }}">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="/" class="site-brand">
                        <img src="{{ URL::to('front-end/image/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-5">
                    <div class="header-search-block">
                        <form action="{{ route('book.search') }}" method="get">
                            <input type="text" placeholder="Search entire store here" name="query"
                                   value="{{ Session::get('query') }}">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            @guest
                                <div class="login-block">
                                    <a href="{{ route('login') }}" class="font-weight-bold">Login</a> <br>
                                    <span>or</span><a href="{{ route('register') }}">Register</a>
                                </div>
                            @endguest
                            <div class="cart-block">
                                <div class="cart-total">
                                    @auth
                                        <span class="text-number">
                                            @if($cart)
                                                {{ count($cart['value']) }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    @endauth
                                    <span class="text-item">
                                        Shopping Cart
                                    </span>
                                    <span class="price text-center">
                                        @php $total = 0; @endphp
                                        @auth
                                            @if($cart)
                                                @foreach($cart['value'] as $value)
                                                    @php $total += $value['price'] * $value['quantity']; @endphp
                                                @endforeach
                                            @endif
                                            £{{ $total }}
                                        @endauth
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="cart-dropdown-block"
                                     @if($cart) style="height: 50vh;overflow-y: scroll;" @endif>
                                    @auth
                                        <div class="single-cart-block">
                                            @if($cart)
                                                @foreach($cart['value'] as $value)
                                                    <div class="cart-product">
                                                        <a href="{{ route('book.details', $value['slug']) }}"
                                                           class="image">
                                                            <img src="{{ URL::to($value['image']) }}" alt="">
                                                        </a>
                                                        <div class="content">
                                                            <h3 class="title"><a
                                                                    href="{{ route('book.details', $value['slug']) }}">{{ $value['name'] }}</a>
                                                            </h3>
                                                            <p class="price"><span class="qty">{{ $value['quantity'] }} ×</span>
                                                                £{{ $value['price'] }}</p>
                                                            <button class="cross-btn"
                                                                    onclick="removeToCart({{ $value['id'] }})"><i
                                                                    class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="cart-product justify-content-center">
                                                    <div class="content">
                                                        <p class="price">No items in cart</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="single-cart-block">
                                            <div class="btn-block">
                                                <a href="{{ route('cart') }}" class="btn">View Cart <i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="single-cart-block">
                                            <div class="cart-product justify-content-center">
                                                <div class="content">
                                                    <a href="{{ route('login') }}">Login</a> or <a
                                                        href="{{ route('register') }}">Register</a> to view cart
                                                </div>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom @if(Request::path() == '/') @else bg-primary @endif ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i
                                    class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                @foreach($categories as $category)
                                    <li class="cat-item"><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right li-last-0">
                            <li class="menu-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-mobile-menu">
    <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
        <div class="container">
            <div class="row align-items-sm-end align-items-center">
                <div class="col-md-4 col-7">
                    <a href="/" class="site-brand">
                        <img src="{{ URL::to('front-end/image/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-5 order-3 order-md-2">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i
                                    class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                @foreach($categories as $category)
                                    <li class="cat-item"><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-5 order-md-3 text-right">
                    <div class="mobile-header-btns header-top-widget">
                        <ul class="header-links">
                            <li class="sin-link">
                                <a href="{{ route('cart') }}" class="cart-link link-icon"><i class="ion-bag"></i></a>
                            </li>
                            <li class="sin-link">
                                <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                        class="ion-navicon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <aside class="off-canvas-wrapper">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>
        <div class="off-canvas-inner">
            <div class="search-box offcanvas">
                <form>
                    <input type="text" placeholder="Search Here">
                    <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>
            <div class="mobile-navigation">
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu main-mobile-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                    </ul>
                </nav>
            </div>
            <nav class="off-canvas-nav">
                <ul class="mobile-menu menu-block-2">
                    @auth
                        <li class="menu-item-has-children">
                            <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       href="{{ route('logout') }}">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </nav>
            <div class="off-canvas-bottom">
                <div class="contact-list mb--10">
                    <a href="#" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                    <a href="#" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                </div>
                <div class="off-canvas-social">
                    <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </aside>
</div>


<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="/" class="site-brand">
                    <img src="{{ URL::to('front-end/image/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        <li class="menu-item has-children">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.remove-to-cart')
