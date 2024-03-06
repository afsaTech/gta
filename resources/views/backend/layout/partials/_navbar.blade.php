<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    @hasrole('admin')
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" name="search" id="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
    @endhasrole

    @hasrole('admin')
        <!-- Notification Section -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>&nbsp;
                <span class="badge badge-danger navbar-badge" id="unread-notifications-count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Notifications</span>
                <div class="dropdown-divider"></div>
                <div id="unread-notifications"></div>
                <div class="dropdown-divider"></div>
            </div>
        </li>

        <!-- Full Screen -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    @endrole
    <!-- UserLogout Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="{{ asset('adminlte/dist/img/avatar.png') }}" style="height: 20px; width: 20px;" alt="user-image"
                class="img-size-50 mr-2 img-circle">
            <span class="mr-2">
                @auth
                    @php
                        $user = auth()->user();
                    @endphp
                    {{ $user->username ?? Str::ucfirst($user->name) }}
                @endauth
                @guest
                    Guest
                @endguest
            </span>
            <span class="fas fa-caret-down"></span>
        </a>
        @auth
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('profile.show-change-password') }}" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Credentials
                                <span class="float-right text-sm text-green"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm text-muted"><i class="fas fa-key green fa-sm"></i> Change Password</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>

                <a href="{{ route('logout') }}" class="dropdown-item" role="button">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Logout
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm text-muted"><i class="fas fa-power-off red fa-sm"></i>&nbsp;Logout</p>
                        </div>
                    </div>
                </a>
            </div>
        @endauth
    </li>
</ul>
