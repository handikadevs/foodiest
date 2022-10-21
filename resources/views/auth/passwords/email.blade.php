@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <main class="container-fluid w-100" role="main">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center bg-white mnh-100vh">
                <a class="u-login-form py-3 mb-auto" href="/">
                    <img class="img-fluid" src="{{ asset('cms') }}/assets/img/logo-foodiest-blue.png" width="200"
                        alt="Foodiest">
                </a>

                <div class="u-login-form">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="mb-3" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <h2>Reset Password</h2>
                            <h4>If you do not receive an email, please make sure to check your spam folder as well.</h4>
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

                        <button class="btn btn-primary btn-block" type="submit">Send Password Reset Link</button>
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
