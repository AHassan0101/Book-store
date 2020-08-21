<!DOCTYPE html>
<html lang="zxx">

@include('layouts.head')

@if(Request::path() !== '/')
    <style>
        .category-nav .category-trigger {
            color: #fff !important;
        }

        ul.main-menu > li.menu-item > a {
            color: #fff !important;
        }
    </style>
@endif

<body>

<div class="site-wrapper" id="top">

    @include('layouts.navbar')
    @yield('content')

</div>


@include('layouts.footer')
@include('layouts.scripts')

</body>

</html>
