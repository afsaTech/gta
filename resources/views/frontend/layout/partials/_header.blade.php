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
               <a href="{{ route('welcome.index') }}">
                  <img class="white-logo" src="{{ asset('gta/images/logo.png') }}" alt="logo" height="80" width="80">
                  <img class="black-logo" src="{{ asset('gta/images/logo.png') }}" alt="logo" height="80" width="80">
            </h1>
         </div>
         <div class="main-navigation d-none d-lg-block">
         <!-- <nav id="navigation" class="navigation">
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
            </nav> -->
         </div>
         <div class="header-btn">
            <a href="#" class="button-primary">BOOK NOW</a>
         </div>
      </div>
   </div>
   <div class="mobile-menu-container"></div>
</header>