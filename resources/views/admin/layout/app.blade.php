<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('gta/vendors/bootstrap/css/bootstrap.min.css')}}" media="all">
    <!-- Fonts Awesome CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('gta/css/all.css')}}"> --}}
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('gta/css/admin-style.css')}}">
    <!-- Font awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    <title>{{str_replace("_"," ",config('app.name', 'Go Tanzania Adventure'))}}</title>
</head>
<body>
    <!-- start Container Wrapper -->
    <div id="container-wrapper">
        <!-- Dashboard -->
        <div id="dashboard" class="dashboard-container">
            <div class="dashboard-header sticky-header">
                <div class="content-left  logo-section pull-left">
                    <h1><a href="../index.html"><img src="assets/images/logo.png" alt=""></a></h1>
                </div>
                <div class="heaer-content-right pull-right">
                    <div class="search-field">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" placeholder="Search Now">
                                <a href="#"><span class="search_btn"><i class="fa fa-search"
                                            aria-hidden="true"></i></span></a>
                            </div>
                        </form>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" id="notifyDropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="dropdown-item">
                                <i class="far fa-envelope"></i>
                                <span class="notify">3</span>
                            </div>
                        </a>
                        <div class="dropdown-menu notification-menu" aria-labelledby="notifyDropdown">
                            <h4> 3 Notifications</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="assets/images/comment.jpg" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="assets/images/comment2.jpg" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="assets/images/comment3.jpg" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="all-button">See all messages</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-item">
                                <i class="far fa-bell"></i>
                                <span class="notify">3</span>
                            </div>
                        </a>
                        <div class="dropdown-menu notification-menu">
                            <h4> 3 Messages</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="assets/images/comment4.jpg" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="assets/images/comment5.jpg" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="list-img">
                                            <img src="assets/images/comment6.jpg" alt="">
                                        </div>
                                        <div class="notification-content">
                                            <p>You have a notification.</p>
                                            <small>2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="all-button">See all messages</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-item profile-sec">
                                <img src="assets/images/comment.jpg" alt="">
                                <span>My Account </span>
                                <i class="fas fa-caret-down"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu account-menu">
                            <ul>
                                <li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
                                <li><a href="#"><i class="fas fa-user-tie"></i>Profile</a></li>
                                <li><a href="#"><i class="fas fa-key"></i>Password</a></li>
                                <li>
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <i class="fas fa-sign-out-alt"></i>
                                        <button type="submit" style="outline:none; border:none; background:none;" class="btn">Logout</li>
                                    </form>
                                    
                            </ul>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="dashboard-navigation">
                <!-- Responsive Navigation Trigger -->
                <div id="dashboard-Navigation" class="slick-nav">
                    <div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0"
                            class="slicknav_btn slicknav_collapsed" style="outline: none;"><span
                                class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span
                                    class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span
                                    class="slicknav_icon-bar"></span></span></a>
                        <div id="navigation" class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu"
                            style="display: none;">
                            <ul>
                                <li class="active-menu"><a href="{{url('/admin')}}" role="menuitem"><i
                                            class="far fa-chart-bar"></i> Dashboard</a></li>
                                <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem"
                                        aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row"
                                        style="outline: none;"><a><i class="fas fa-user"></i>Users</a>
                                        <span class="slicknav_arrow"><i class="fas fa-plus"></i></span></a>
                                    <ul role="menu" class="slicknav_hidden" aria-hidden="true" style="display: none;">
                                        <li>
                                            <a href="user.html" role="menuitem" tabindex="-1">User</a>
                                        </li>
                                        <li>
                                            <a href="user-edit.html" role="menuitem" tabindex="-1">User edit</a>
                                        </li>
                                        <li>
                                            <a href="new-user.html" role="menuitem" tabindex="-1">New user</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{route('Packages.create')}}" role="menuitem"><i
                                            class="fas fa-umbrella-beach"></i>Add Package</a></li>
                                <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem"
                                        aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row"
                                        style="outline: none;">
                                        <a><i class="fas fa-hotel"></i>packages</a>
                                        <span class="slicknav_arrow"><i class="fas fa-plus"></i></span></a>
                                    <ul role="menu" class="slicknav_hidden" aria-hidden="true" style="display: none;">
                                        <li><a href="{{url('/admin/packages/active')}}" role="menuitem" tabindex="-1">Active</a>
                                        </li>
                                        <li><a href="{{url('/admin/packages/pending')}}" role="menuitem" tabindex="-1">Pending</a>
                                        </li>
                                        <li><a href="{{url('/admin/packages/expired')}}" role="menuitem" tabindex="-1">Expired</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="db-booking.html" role="menuitem"><i class="fas fa-ticket-alt"></i> Booking
                                        &amp; Enquiry</a></li>
                                <li><a href="db-wishlist.html" role="menuitem"><i class="far fa-heart"></i>Wishlist</a>
                                </li>
                                <li><a href="db-comment.html" role="menuitem"><i class="fas fa-comments"></i>Comments</a></li>
                                <li>
                                    <form action="{{route('logout')}}" method="post" >
                                        @csrf
                                        <i class="fas fa-sign-out-alt"></i> 
                                        <button style="outline:none; border:none; background:none;" type="submit" class="btn text-white">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="db-info-wrap">
            @yield('content')
            </div>
            <!-- Copyrights -->
            <div class="copyrights">
                Copyright &copy; {{now()->year}}  {{ str_replace("_"," ",config('app.name', 'Go Tanzania Adventure')) }}. All rights reserveds.
            </div>
        </div>
        <!-- Dashboard / End -->
    </div>
    <!-- end Container Wrapper -->
    <!-- *Scripts* -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="{{asset('gta/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('gta/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('gta/js/canvasjs.min.js')}}"></script>
    <script src="{{asset('gta/js/chart.js')}}"></script>
    <script src="{{asset('gta/js/jquery.counterup.js')}}"></script>
    <script src="{{asset('gta/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('gta/js/dashboard-custom.js')}}"></script>
    <script src="{{asset('gta/js/gallery.js')}}"></script>
</body>
</html>