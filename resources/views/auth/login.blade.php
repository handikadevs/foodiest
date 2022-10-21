@extends('layouts.app')

@section('content')
    <main class="container-fluid w-100" role="main">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center bg-white mnh-100vh">
                <a class="u-login-form py-3 mb-auto" href="/">
                    <img class="img-fluid" src="{{ asset('cms') }}/assets/img/logo-foodiest-blue.png" width="200"
                        alt="Foodiest">
                </a>

                <div class="u-login-form">
                    <form class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <h2>Sign In</h2>
                            <h3>to access your foodiest services</h3>
                        </div>

                        <div class="form-group mt-4">
                            <input id="email" type="email"
                                class="form-control form-pill @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <input id="password" type="password"
                                class="form-control form-pill @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-center mb-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="rememberMe"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="rememberMe">Remember me</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="link-muted" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </form>

                    <p class="small">
                        Dont have an account? <a href="{{ route('register') }} ">Register here</a>
                    </p>
                </div>

                <div class="u-login-form text-muted py-3 mt-auto">
                    <p class="h5 mb-0 ml-auto">
                        &copy; {{ date('Y') }} <a class="link-muted" href="https://codeanyanbl.github.io/"
                            target="_blank">codeanyanbl</a>. All Rights Reserved.
                    </p>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-flex flex-column align-items-center justify-content-center bg-light">
                <img class="img-fluid position-relative u-z-index-3 mx-5"
                    src="{{ asset('cms') }}/assets/svg/mockups/mockup.svg" alt="Sign In">

                <figure class="u-shape u-shape--top-right u-shape--position-5">
                    <img src="{{ asset('cms') }}/assets/svg/shapes/shape-1.svg" alt="Sign In">
                </figure>
                <figure class="u-shape u-shape--center-left u-shape--position-6">
                    <img src="{{ asset('cms') }}/assets/svg/shapes/shape-2.svg" alt="Sign In">
                </figure>
                <figure class="u-shape u-shape--center-right u-shape--position-7">
                    <img src="{{ asset('cms') }}/assets/svg/shapes/shape-3.svg" alt="Sign In">
                </figure>
                <figure class="u-shape u-shape--bottom-left u-shape--position-8">
                    <img src="{{ asset('cms') }}/assets/svg/shapes/shape-4.svg" alt="Sign In">
                </figure>
            </div>
        </div>
    </main>
@endsection
