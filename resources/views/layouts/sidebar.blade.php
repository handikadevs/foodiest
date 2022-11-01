<!-- Sidebar -->
<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner">
        <header class="u-sidebar-header">
            <a class="u-sidebar-logo" href="index.html">
                <img class="img-fluid" src="{{ asset('cms') }}/assets/img/logo.png" width="124" alt="Stream Dashboard">
            </a>
        </header>

        <nav class="u-sidebar-nav">
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Dashboard -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link {{ request()->is('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        <i class="fa fa-cubes u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Food -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link {{ request()->is('food*') ? 'active' : '' }}" href="{{ route('food.asian') }}">
                        <i class="fa fa-utensils u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Food</span>
                    </a>
                </li>
                <!-- End Food -->

                <!-- Cake -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link {{ request()->is('cake*') ? 'active' : ''}}" href="{{ route('cakes.index')}}">
                        <i class="fa fa-birthday-cake u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Cake</span>
                    </a>
                </li>
                <!-- End Cake -->

                <!-- Drink -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link" href="#!" data-target="#subMenu2">
                        <i class="fa fa-cocktail u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Drink</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="subMenu2" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                        style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">C</span>
                                <span class="u-sidebar-nav-menu__item-title">Coffee and Tea</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">J</span>
                                <span class="u-sidebar-nav-menu__item-title">Juice</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">M</span>
                                <span class="u-sidebar-nav-menu__item-title">Milk</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#">
                                <span class="u-sidebar-nav-menu__item-icon">S</span>
                                <span class="u-sidebar-nav-menu__item-title">Squash</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Drink -->

                <hr>

                @if (Auth::user()->hasRole('admin'))
                    <!-- User Management -->
                    <li
                        class="u-sidebar-nav-menu__item {{ request()->is('user_management*') ? 'u-sidebar-nav--opened' : '' }}">
                        <a class="u-sidebar-nav-menu__link {{ request()->is('user_management*') ? 'active' : '' }}"
                            href="#" data-target="#userManagement">
                            <i class="far fa-folder-open u-sidebar-nav-menu__item-icon"></i>
                            <span class="u-sidebar-nav-menu__item-title">User Management</span>
                            <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                            <span class="u-sidebar-nav-menu__indicator"></span>
                        </a>

                        <ul id="userManagement" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                            style="display: none;">
                            <li class="u-sidebar-nav-menu__item">
                                <a class="u-sidebar-nav-menu__link {{ request()->is('user_management/users*') ? 'active' : '' }}"
                                    href="{{ route('users.index') }}">
                                    <span class="u-sidebar-nav-menu__item-icon">U</span>
                                    <span class="u-sidebar-nav-menu__item-title">User</span>
                                </a>
                            </li>
                            <li class="u-sidebar-nav-menu__item">
                                <a class="u-sidebar-nav-menu__link" href="#">
                                    <span class="u-sidebar-nav-menu__item-icon">R</span>
                                    <span class="u-sidebar-nav-menu__item-title">Role</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End User Management -->
                @endif
            </ul>
        </nav>
    </div>
</aside>
<!-- End Sidebar -->
