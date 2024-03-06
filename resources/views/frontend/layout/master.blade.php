<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Go Tanzania Adventure @yield('title')</title>

   <!-- favicon -->
   <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('gta/vendors/bootstrap/css/bootstrap.min.css') }}" media="all">
   
   <!-- jquery-ui css -->
   <link rel="stylesheet" type="{{ asset('gta/vendors/jquery-ui/jquery-ui.min.css') }}">
   <!-- modal video css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('gta/vendors/modal-video/modal-video.min.css') }}">
   <!-- light box css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('gta/vendors/lightbox/dist/css/lightbox.min.css') }}">
   <!-- slick slider css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('gta/vendors/slick/slick.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('gta/vendors/slick/slick-theme.css') }}">
   <!-- google fonts -->
   <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
      rel="stylesheet">

   <!-- Font awesome Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">

   <!-- smooth scroll -->
   <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
   <!-- Custom CSS -->
   <link rel="stylesheet" type="text/css" href="{{ asset('gta/gta-master-style.css') }}">

   @yield('css')

   <style>
      #inner-packages-banner {
         background-image: url('{{ asset("gta/images/img4.jpg") }}')
      }

      #inner-package-banner {
         background-image: url('{{ asset("gta/images/slider-banner-4.jpg") }}');
      }
   </style>
</head>

<body class="home">
   <div id="page" class="full-page">

      <!-- Header Start -->
      @include(config('system.paths.frontend.layout_partials') . '_header ')
      <!-- Header Ends -->
      
      <main id="content" class="site-main">
        @yield('content')
      </main>
      
      <!-- Footer Start -->
      @include(config('system.paths.frontend.layout_partials') . '_footer')
      <!-- Footer Ends -->

      <a id="backTotop" href="#" class="to-top-icon">
         <i class="fas fa-chevron-up"></i>
      </a>

      <!-- Custom search field Start -->
      @include(config('system.paths.frontend.layout_partials') . '_search_field')
      <!-- Custom search field Ends -->
   </div>
</body>

   <!-- JavaScript -->
   <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
   <script src="{{ asset('gta/js/jquery.js') }}"></script>
   <script src="{{ asset('gta/js/jquery-3.2.1.min.js') }}"></script>
   <script src="{{ asset('gta/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('gta/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
   <script src="{{ asset('gta/vendors/countdown-date-loop-counter/loopcounter.js') }}"></script>
   <script src="{{ asset('gta/js/jquery.counterup.js') }}"></script>
   <script src="{{ asset('gta/vendors/modal-video/jquery-modal-video.min.js') }}"></script>
   <script src="{{ asset('gta/vendors/masonry/masonry.pkgd.min.js') }}"></script>
   <script src="{{ asset('gta/vendors/lightbox/dist/js/lightbox.min.js') }}"></script>
   <script src="{{ asset('gta/vendors/slick/slick.min.js') }}"></script>
   <script src="{{ asset('gta/js/jquery.slicknav.js') }}"></script>
   <script src="{{ asset('gta/js/custom.min.js') }}"></script>
   <script src="{{ asset('gta/js/gallery.js') }}"></script>

   @yield('js')
</html>