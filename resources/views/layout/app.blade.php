<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- favicon -->
   <link rel="icon" type="image/png" href="assets/images/favicon.png">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('gta/vendors/bootstrap/css/bootstrap.min.css')}}" media="all">
   
   <!-- jquery-ui css -->
   <link rel="stylesheet" type="{{asset('gta/vendors/jquery-ui/jquery-ui.min.css')}}">
   <!-- modal video css -->
   <link rel="stylesheet" type="text/css" href="{{asset('gta/vendors/modal-video/modal-video.min.css')}}">
   <!-- light box css -->
   <link rel="stylesheet" type="text/css" href="{{asset('gta/vendors/lightbox/dist/css/lightbox.min.css')}}">
   <!-- slick slider css -->
   <link rel="stylesheet" type="text/css" href="{{asset('gta/vendors/slick/slick.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('gta/vendors/slick/slick-theme.css')}}">
   <!-- google fonts -->
   <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
      rel="stylesheet">
   <!-- Fonts Awesome CSS -->
   {{-- <link rel="stylesheet" type="text/css" href="{{asset('gta/css/all.css')}}"> --}}

   <!-- Font awesome Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">

   <!-- smooth scroll -->
   <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
   <!-- Custom CSS -->
   <link rel="stylesheet" type="text/css" href="{{asset('gta/gta-master-style.css')}}">

   <title>{{ str_replace("_"," ",config('app.name', 'Go Tanzania Adventure')) }}</title>
</head>

<body class="home">
   <div id="page" class="full-page">
      <header id="masthead" class="site-header header-primary">
         <!-- header html start -->
         <div class="top-header">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 d-none d-lg-block">
                     <div class="header-contact-info">
                        <ul>
                           <li>
                              <a href="#"><i class="fas fa-phone-alt"></i> +255 (078) 6627 05</a>
                           </li>
                           <li>
                              <a href=""><i class="fas fa-envelope"></i> <span class="__cf_email__" data-cfemail="">info@gta.co.tz</span></a>
                           </li>
                           <li>
                              <i class="fas fa-map-marker-alt"></i> Morogoro Tanzania
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                     <div class="header-social social-links">
                        <ul>
                           <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                     <div class="header-search-icon">
                        <button class="search-icon">
                           <i class="fas fa-search"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="bottom-header">
            <div class="container d-flex justify-content-between align-items-center">
               <div class="site-identity">
                  <h1 class="site-title">
                     <a href="{{url('/')}}">
                        <img class="white-logo" src="{{asset('gta/images/logo.png')}}" alt="logo" height="80" width="80">
                        <img class="black-logo" src="{{asset('gta/images/logo.png')}}" alt="logo" height="80" width="80">
                       {{-- <span class="white-logo">{{ str_replace("_"," ",config('app.name', 'Go Tanzania Adventure')) }}</span>  --}}
                       {{-- <span class="black-logo">{{ str_replace("_"," ",config('app.name', 'Go Tanzania Adventure')) }}</span>  --}}
                  </h1>
               </div>
               <div class="main-navigation d-none d-lg-block">
                  <nav id="navigation" class="navigation">
                     <ul>
                           <li class="menu-item"><a href="{{('#packages')}}">Packages</a></li>
                           <li class="menu-item"><a href="{{('#team')}}">Team</a></li>
                           <li class="menu-item"><a href="{{('#services')}}">Services</a></li> 
                           <li class="menu-item-has-children">
                              <a href="#about">Tour</a> 
                           <ul>
                              <li><a href="{{url('/packages')}}">Packages</a></li>
                              <li><a href="http://">Guide</a></li>
                              {{-- <li><a href="http://">FAQ's</a></li> --}}
                           </ul>
                        </li> 
                           <li class="menu-item-has-children">
                                 <a href="#about">About us </a> 
                              <ul>
                                 <li><a href="http://">Services</a></li>
                                 <li><a href="http://">Gallary</a></li>
                                 <li><a href="http://">FAQ's</a></li>
                              </ul>
                           </li> 
                       {{-- @guest
                          @if (Route::has('login'))
                           <li class="menu-item"><a href="" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#loginModal">{{__('Login')}}</a></li>
                         @endif
                         @if (Route::has('register'))
                           <li class="menu-item"><a href="{{route('register')}}" class="nav-link">{{__('Register')}}</a></li>
                         @endif
       
                         @else
                           <li class="menu-item has-children">
                               <a class="nav-link">{{ Auth::user()->name }}</a>
                                 <ul class="dropdown arrow-top">
                                   <li><a class="nav-link" href="#"> {{ __('Dashboard') }}</a></li>
                                   <li>
                                   <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                   </a>
                                   </li>
       
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                             </ul>
                         </li>
                       @endguest --}}
                       {{-- Authntification menu End--}}
                     </ul>
                  </nav>
               </div>
               <div class="header-btn">
                  <a href="#" class="button-primary">BOOK NOW</a>
               </div>
            </div>
         </div>
         <div class="mobile-menu-container"></div>
      </header>
      <main id="content" class="site-main">
        @yield('content')
      </main>
      <footer id="colophon" class="site-footer footer-primary" id="about">
         <div class="top-footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-6">
                     <aside class="widget widget_text">
                        <h3 class="widget-title">
                           {{ str_replace("_"," ",config('app.name', 'Go Tanzania Adventure')) }}
                        </h3>
                        <div class="textwidget widget-text">
                           <p style="text-align: justify;">Go Tanzania Adventure Tourism and Travel Agency is your gateway to experiencing the breathtaking
                              beauty and thrilling adventures of Tanzania. With a passion for showcasing the country's natural wonders,
                               rich culture, and diverse wildlife, we specialize in crafting unforgettable journeys for travelers seeking 
                               an authentic Tanzanian experience.
                            </p>
                        </div>
                        <div class="award-img">
                           <a href="#"><img src="assets/images/logo6.png" alt=""></a>
                           <a href="#"><img src="assets/images/logo2.png" alt=""></a>
                        </div>
                     </aside>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     <aside class="widget widget_text">
                        <h3 class="widget-title">CONTACT INFORMATION</h3>
                        <div class="textwidget widget-text">
                           <p>Got question or ready to explore Tanzania?. Contact us today.</p>
                           <ul>
                              <li>
                                 <a href="#">
                                    <i class="fas fa-phone-alt"></i>
                                    +255 78662705
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <i class="fas fa-envelope"></i>
                                    <span>info@gta.co.tz</span>
                                 </a>
                              </li>
                              <li>
                                 <i class="fas fa-map-marker-alt"></i>
                                 Morogoro, Tanzania
                              </li>
                           </ul>
                        </div>
                     </aside>
                  </div>
                  {{-- <div class="col-lg-3 col-md-6">
                     <aside class="widget widget_recent_post">
                        <h3 class="widget-title">Latest Post</h3>
                        <ul>
                           <li>
                              <h5>
                                 <a href="#">Life is a beautiful journey not a destination</a>
                              </h5>
                              <div class="entry-meta">
                                 <span class="post-on">
                                    <a href="#">August 17, 2021</a>
                                 </span>
                                 <span class="comments-link">
                                    <a href="#">No Comments</a>
                                 </span>
                              </div>
                           </li>
                           <li>
                              <h5>
                                 <a href="#">Take only memories, leave only footprints</a>
                              </h5>
                              <div class="entry-meta">
                                 <span class="post-on">
                                    <a href="#">August 17, 2021</a>
                                 </span>
                                 <span class="comments-link">
                                    <a href="#">No Comments</a>
                                 </span>
                              </div>
                           </li>
                        </ul>
                     </aside>
                  </div> --}}
                  <div class="col-lg-4 col-md-6">
                     <aside class="widget widget_newslatter">
                        <h3 class="widget-title">SUBSCRIBE US</h3>
                        <div class="widget-text">
                           <p>Subscribe now for Tanzania adventures,wildlife encounters,and cultural immersion!</p>
                        </div>
                        <form class="newslatter-form">
                           <input type="email" name="s" placeholder="Your Email..">
                           <input type="submit" name="s" value="SUBSCRIBE NOW">
                        </form>
                     </aside>
                  </div>
               </div>
            </div>
         </div>
         <div class="buttom-footer">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-md-5">
                     <div class="footer-menu">
                        <ul>
                           <li>
                              <a href="#">Privacy Policy</a>
                           </li>
                           <li>
                              <a href="#">Term & Condition</a>
                           </li>
                           <li>
                              <a href="#">FAQ</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-2 text-center">
                     <div class="footer-logo">
                        <a href="#"><img src="assets/images/travele-logo.png" alt=""></a>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="copy-right text-right">&copy; {{now()->year}} {{ str_replace("_"," ",config('app.name', 'Go Tanzania Adventure')) }}. All rights reserveds</div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <a id="backTotop" href="#" class="to-top-icon">
         <i class="fas fa-chevron-up"></i>
      </a>
      <!-- custom search field html -->
      <div class="header-search-form">
         <div class="container">
            <div class="header-search-container">
               <form class="search-form" role="search" method="get">
                  <input type="text" name="s" placeholder="Enter your text...">
               </form>
               <a href="#" class="search-close">
                  <i class="fas fa-times"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- header html end -->
   </div>
   <!-- JavaScript -->
   <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
   <script src="{{asset('gta/js/jquery.js')}}"></script>
   <script src="{{asset('gta/js/jquery-3.2.1.min.js')}}"></script>
   <script src="{{asset('gta/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('gta/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
   <script src="{{asset('gta/vendors/countdown-date-loop-counter/loopcounter.js')}}"></script>
   <script src="{{asset('gta/js/jquery.counterup.js')}}"></script>
   <script src="{{asset('gta/vendors/modal-video/jquery-modal-video.min.js')}}"></script>
   <script src="{{asset('gta/vendors/masonry/masonry.pkgd.min.js')}}"></script>
   <script src="{{asset('gta/vendors/lightbox/dist/js/lightbox.min.js')}}"></script>
   <script src="{{asset('gta/vendors/slick/slick.min.js')}}"></script>
   <script src="{{asset('gta/js/jquery.slicknav.js')}}"></script>
   <script src="{{asset('gta/js/custom.min.js')}}"></script>
   <script src="{{asset('gta/js/gallery.js')}}"></script>
</html>