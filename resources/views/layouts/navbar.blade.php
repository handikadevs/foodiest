@guest
@else
    <!-- Header (Navbar) -->
    <header class="u-header">
        <div class="u-header-left">
            <a class="u-header-logo" href="#">
                <img class="u-logo-desktop" src="{{ asset('cms') }}/assets/img/logo-foodiest-blue.png" width="160"
                    alt="Stream Dashboard">
                <img class="img-fluid u-logo-mobile" src="{{ asset('cms') }}/assets/img/logo-sm.png" width="50"
                    alt="Stream Dashboard">
            </a>
        </div>

        <div class="u-header-right">
            <!-- User Profile -->
            <div class="dropdown ml-2">
                <a class="link-muted d-flex align-items-center" href="#!" role="button" id="dropdownMenuLink"
                    aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                    <img class="u-avatar--xs img-fluid rounded-circle mr-2"
                        src="{{ asset('cms') }}/assets/img/avatars/img1.jpg" alt="User Profile">
                    <span class="text-dark d-none d-sm-inline-block">
                        {{ Auth::user()->name }} <small class="fa fa-angle-down text-muted ml-1"></small>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-3" aria-labelledby="dropdownMenuLink"
                    style="width: 260px;">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-4">
                                    <a class="d-flex align-items-center link-dark" href="#!">
                                        <span class="h3 mb-0"><i class="far fa-user-circle text-muted mr-3"></i></span> View
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex align-items-center link-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        <span class="h3 mb-0"><i class="far fa-share-square text-muted mr-3"></i></span> Log
                                        Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Profile -->
        </div>
    </header>
@endguest
<!-- End Header (Navbar) -->
