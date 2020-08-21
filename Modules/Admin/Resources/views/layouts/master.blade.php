<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<style>
    html body .content.app-content {
        overflow: auto !important;
    }
</style>

@include('admin::layouts.head')

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-content-menu" data-col="2-columns">

@include('admin::layouts.header')

<div class="app-content content">
    <div class="content-wrapper">
        @include('admin::layouts.sidebar')
        @yield('content')
    </div>
</div>

@include('admin::layouts.footer')

@include('admin::layouts.scripts')

</body>
</html>
