@extends('admin.layouts.app')

@section('content')

<!-- Home section Start -->
<section class="home" id="home">
   <div class="content">
      <h5>Welcome to Tanzania</h5>
      <h1>Visit <span class="changecontent"></span></h1>
      <p>Come join us for an unforgettable adventure in the heart of Africa</p>
      <!-- Button to Open the Modal -->
      @if(!Auth::User())
      <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
         Login to Book online
      </button>
      @endif
   </div>
</section>
<!--Home section End-->

<!--Packages Section Start-->
<section class="package-section mt-5" id="packages">
   <div class="container">
      <div class="section-heading text-center">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <h5 class="dash-style">EXPLORE GREAT TANZANIA PLACES</h5>
               <h1>RECENTLY PACKAGES</h1>
               <p>Discover the hidden gem of Tanzania with our Uluguru and Udzungwa Mountains hike ,Mikumi and Mwl.Julius Nyerere national Parks.Trek through lush forests,charming villages, and scenic viewpoints.</p>
            </div>
         </div>
      </div>
      <div class="package-inner">
         <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="package-wrap">
                 <figure class="feature-image">
                    <a href="#">
                       <img src="#" alt="Package Image">
                    </a>
                 </figure>
                 <div class="package-price">
                    <h6>
                       <span>56</span> / per person
                    </h6>
                 </div>
                 <div class="package-content-wrap">
                    <div class="package-meta text-center">
                       <ul>
                          <li>
                             <i class="far fa-clock"></i>
                             8
                             Days
                          </li>
                          <li>
                             <i class="fas fa-user-friends"></i>
                             People: 6
                          </li>
                          <li>
                             <i class="fas fa-map-marker-alt"></i>
                             Serengeti
                          </li>
                       </ul>
                    </div>
                    <div class="package-content">
                       <h3>
                          <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga sint vero facilis architecto et ipsam perspiciatis ipsum mollitia deleniti illum,</a>
                       </h3>
                       {{-- <div class="review-area">
                          <span class="review-text">(25 reviews)</span>
                          <div class="rating-start" title="Rated 5 out of 5">
                             <span style="width: 60%"></span>
                          </div>
                       </div> --}}
                       <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero laborum pariatur ex doloremque officia! Dolores ullam eos ut, vel, 
                        similique sequi ex iure modi nisi facilis blanditiis non, numquam quasi?</p>
                       <div class="btn-wrap">
                          {{-- <a href="#" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                          <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a> --}}
                       </div>
                    </div>
                 </div>
              </div>
           </div>
         </div>
        
         <div class="btn-wrap text-center">
            <a href="#" class="button-primary">VIEW ALL PACKAGES</a>
         </div>
      </div>
   </div>
</section>
<!--Packages Section End -->

<!-- Services Section Start-->
<section class="services" id="services">
   <div class="container">
      <div class="main-text row">
         <div class="col-lg-8 offset-lg-2">
            {{-- <h5 class="dash-style">EXPLORE GREAT PLACES</h5> --}}
            <h1>OUR SERVICES</h1>
            <p>Go Tanzania Adventure offers thrilling safaries,mesmering treks,enriching culture tours,and beach
               gateways. Explore Tanzania's wonders with our expert guides and create unforgettable memories.</p>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-md-4 py-3 py-md-0">
            <div class="card">
               <i class="fas fa-hiking"></i>
               <div class="card-body">
                  <h3>Adventure</h3>
                  <p>&quot; Eperience the thrill of a lifetime with our Adventure service!,From thrilling safaries to
                     epic mountain treks, Go Tanzania Adventure guarantees unforgettable journeys filled with awe and
                     wonder &quot;</p>
               </div>
            </div>
         </div>

         <div class="col-md-4 py-3 py-md-0">
            <div class="card">
               <i class="fas fa-utensils"></i>
               <div class="card-body">
                  <h3>Food And Drinks</h3>
                  <p>&quot; Indulge in Tanzania's culinary delights wit our Food and Drinks Services!, Savory local
                     cuisine and refreshing bevarages await,enhancing your adventure with a test of authentic African
                     flavours.&quot;</p>
               </div>
            </div>
         </div>

         <div class="col-md-4 py-3 py-md-0">
            <div class="card">
               <i class="fas fa-bullhorn"></i>
               <div class="card-body">
                  <h3>Safety and Guidance</h3>
                  <p> &quot; Go tanzania Adventure priorities your safety with experienced guides,well-maintained
                     equipment,and through briefings.Our guidance ensures worry-free exploration of Tanzania's wwonders.
                     Your safety is our priority.&quot;</p>
               </div>
            </div>
         </div>

      </div>

   </div>
</section>
<!-- Services Section End-->

<!-- Best Shared Photos Section Start -->
<section class="best-section mt-5">
  <div class="container">
     <div class="row">
        <div class="col-lg-5">
           <div class="section-heading">
              <h5 class="dash-style">OUR TOUR GALLERY</h5>
              <h2>OUR BEST PHOTOS</h2>
              <p style="text-align: justify">Absolutely stunning! Go Tanzania Adventure truly delivered an unforgettable experience.
                From close encounters with wildlife to breathtaking landscapes,this trip exceeded all expectations.
                Highly reccommended for anyone seeking
                adventure and natural beauty! &#128247;
                #Go Tanzania Adventure #TravelMemories</p>
           </div>
           <figure class="gallery-img">
              <img src="{{asset('images/hero-banner.jpg')}}" alt="">
           </figure>
        </div>
        <div class="col-lg-7">
           <div class="row">
              <div class="col-sm-6">
                 <figure class="gallery-img">
                    <img src="{{asset('images/hero-banner.jpg')}}" alt="">
                 </figure>
              </div>
              <div class="col-sm-6">
                 <figure class="gallery-img">
                    <img src="{{asset('images/hero-banner.jpg')}}" alt="">
                 </figure>
              </div>
           </div>
           <div class="row">
              <div class="col-12">
                 <figure class="gallery-img">
                    <img src="{{asset('images/hero-banner.jpg')}}" alt="">
                 </figure>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>
<!--Best shared Photos -->

<!-- Call Back Section Start-->
<section class="callback-section mt-5">
  <div class="container">
     <div class="row no-gutters align-items-center">
        <div class="col-lg-5">
           <div class="callback-img" style="background-image: url({{asset('images/city-1.jpg')}});">
              <div class="video-button">
                 <a id="video-container" data-video-id="IUN664s7N-c">
                    <i class="fas fa-play"></i>
                 </a>
              </div>
           </div>
        </div>
        <div class="col-lg-7">
           <div class="callback-inner">
              <div class="section-heading section-heading-white">
                 <h5 class="dash-style">CALLBACK FOR MORE</h5>
                 <h2>{{ str_replace("_"," ",config('app.name', 'Go Tanzania Adventure')) }}. REMEMBER US!!</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Eaque adipiscing, luctus eleifend.</p>
              </div>
              <div class="callback-counter-wrap">
                 <div class="counter-item">
                    <div class="counter-icon">
                      <img src="assets/images/icon1.png" alt="">
                    </div>
                    <div class="counter-content">
                       <span class="counter-no">
                          <span class="counter">500</span>K+
                       </span>
                       <span class="counter-text">
                          Satisfied Clients
                       </span>
                    </div>
                 </div>
                 <div class="counter-item">
                    <div class="counter-icon">
                      <img src="assets/images/icon2.png" alt="">
                    </div>
                    <div class="counter-content">
                       <span class="counter-no">
                          <span class="counter">250</span>K+
                       </span>
                       <span class="counter-text">
                          Satisfied Clients
                       </span>
                    </div>
                 </div>
                 <div class="counter-item">
                    <div class="counter-icon">
                      <img src="assets/images/icon3.png" alt="">
                    </div>
                    <div class="counter-content">
                       <span class="counter-no">
                          <span class="counter">15</span>K+
                       </span>
                       <span class="counter-text">
                          Satisfied Clients
                       </span>
                    </div>
                 </div>
                 <div class="counter-item">
                    <div class="counter-icon">
                      <img src="assets/images/icon4.png" alt="">
                    </div>
                    <div class="counter-content">
                       <span class="counter-no">
                          <span class="counter">10</span>K+
                       </span>
                       <span class="counter-text">
                          Satisfied Clients
                       </span>
                    </div>
                 </div>
              </div>
              <div class="support-area">
                 <div class="support-icon">
                    <img src="assets/images/icon5.png" alt="">
                 </div>
                 <div class="support-content">
                    <h4>Contact us today!</h4>
                    <h3>
                       <i class="fa fa-phone"></i> +255 786 62 705
                    </h3>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>
<!-- Call back Section End -->

@include('includes.footer')

@endsection
