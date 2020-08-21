@extends('layouts.master')
@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Register</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                    <form id="login-form" action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">New User</h4>
                            <p><span class="font-weight-bold">I am a new user</span></p>

                            @if(Session::has('error'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('error') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email">Full Name</label>
                                    <input class="mb-0 form-control" type="text" id="name" name="name" required
                                           value="{{ old('name') }}"
                                           placeholder="Enter your full name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="email">Email</label>
                                    <input class="mb-0 form-control" type="email" id="email" name="email" required
                                           value="{{ old('email') }}"
                                           placeholder="Enter Your Email Address Here..">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control" type="password" id="password" name="password"
                                           required placeholder="Enter your password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb--20">
                                    <label for="password">Repeat Password</label>
                                    <input class="mb-0 form-control" type="password" id="repeat-password" required
                                           placeholder="Repeat your password" name="password_confirmation"
                                           autocomplete="new-password">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn--primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
