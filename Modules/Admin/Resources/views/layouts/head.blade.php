<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <title>Admin Dashboard</title>

    <meta name="theme-color" content="#ffffff">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/app.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{URL::to('app-assets/css/core/menu/menu-types/vertical-content-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/pages/timeline.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/plugins/extensions/toastr.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/plugins/forms/checkboxes-radios.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/css/timepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::to('app-assets/vendors/css/forms/selects/select2.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{URL::to('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

    @yield('extra-head')
</head>
