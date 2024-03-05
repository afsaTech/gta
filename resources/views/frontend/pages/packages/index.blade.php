@extends(config('system.paths.frontend.layout') . 'master')

@section('content')
<!-- Inner Banner html start-->
<section class="inner-banner-wrap">
   <div class="inner-baner-container" id="inner-packages-banner">
      <div class="container">
         <div class="inner-banner-content">
            <h1 class="inner-title">Tour Packages</h1>
         </div>
      </div>
   </div>
   <div class="inner-shape"></div>
</section>
<!-- Inner Banner html end-->
<!-- packages html start -->
<div class="package-section">
   <div class="container">
      <div class="package-inner">
         <div class="row">
            @foreach ($packages as $package)
            <div class="col-lg-4 col-md-6 d-flex">
               <div class="package-wrap">
                  <figure class="feature-image">
                     <a href="{{ route('site-packages.index', $package->id)}}">
                        @if ($package->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $package->images->first()->url) }}" alt="Package Image">
                        @else
                        <img src="{{ asset('gta/images/no-image.png') }}" alt="No Image">
                        @endif                     
                     </a>
                  </figure>
                  <div class="package-price">
                     <h6>
                        <span> {{ $package->regular_price }} </span> /person
                     </h6>
                  </div>
                  <div class="package-content-wrap">
                     <div class="package-meta text-center">
                        <ul>
                           <li>
                              <i class="far fa-clock"></i>
                              {{ $package->days}}D/{{$package->nights }} N
                           </li>
                           <li>
                              <i class="fas fa-user-friends"></i>
                              People: {{ $package->size }}
                           </li>
                           <li>
                              <i class="fas fa-map-marker-alt"></i>
                              {{ $package->destination }}
                           </li>
                        </ul>
                     </div>
                     <div class="package-content">
                        <h3>
                           <a href="{{ route('site-packages.show',$package->id) }}">{{ ucfirst($package->title) }}</a>
                        </h3>
                        <div class="review-area">
                           <span class="review-text">(25 reviews)</span>
                           <div class="rating-start" title="Rated 5 out of 5">
                              <span style="width: 60%"></span>
                           </div>
                        </div>
                        <p>{{ (str_word_count($package->description) > 25) ? implode(' ', array_slice(explode(' ', ucfirst($package->description)), 0, 25)) . '...' : ucfirst($package->description) }}</p>
                        <div class="btn-wrap">
                           <a href="#" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                           <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
<!-- packages html end -->
<div class="d-flex justify-content-center m-5">
   {{ $packages->links() }}
 </div>
<!-- Home activity section html start -->
<section class="activity-section">
   <div class="container">
      <div class="section-heading">
         <div class="row">
            <div class="col-lg-7">
               <h5 class="dash-style">TRAVEL BY ACTIVITY</h5>
               <h2>ADVENTURE & ACTIVITY</h2>
            </div>

            <div class="col-lg-5">
               <div class="section-disc">
                  Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.          
               </div>
             </div>

         </div>
      </div>
      
      <div class="activity-inner row">
         <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="activity-item">
               <div class="activity-icon">
                  <a href="#">
                     <img src="assets/images/icon6.png" alt="">
                  </a>
               </div>
               <div class="activity-content">
                  <h4>
                     <a href="#">Adventure</a>
                  </h4>
                  <p>15 Destination</p>
               </div>
            </div>
         </div>
         <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="activity-item">
               <div class="activity-icon">
                  <a href="#">
                     <img src="assets/images/icon10.png" alt="">
                  </a>
               </div>
               <div class="activity-content">
                  <h4>
                     <a href="#">Trekking</a>
                  </h4>
                  <p>12 Destination</p>
               </div>
            </div>
         </div>
         <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="activity-item">
               <div class="activity-icon">
                  <a href="#">
                     <img src="assets/images/icon9.png" alt="">
                  </a>
               </div>
               <div class="activity-content">
                  <h4>
                     <a href="#">Camp Fire</a>
                  </h4>
                  <p>7 Destination</p>
               </div>
            </div>
         </div>
         <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="activity-item">
               <div class="activity-icon">
                  <a href="#">
                     <img src="assets/images/icon8.png" alt="">
                  </a>
               </div>
               <div class="activity-content">
                  <h4>
                     <a href="#">Off Road</a>
                  </h4>
                  <p>15 Destination</p>
               </div>
            </div>
         </div>
         <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="activity-item">
               <div class="activity-icon">
                  <a href="#">
                     <img src="assets/images/icon7.png" alt="">
                  </a>
               </div>
               <div class="activity-content">
                  <h4>
                     <a href="#">Camping</a>
                  </h4>
                  <p>13 Destination</p>
               </div>
            </div>
         </div>
         <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="activity-item">
               <div class="activity-icon">
                  <a href="#">
                     <img src="assets/images/icon11.png" alt="">
                  </a>
               </div>
               <div class="activity-content">
                  <h4>
                     <a href="#">Exploring</a>
                  </h4>
                  <p>25 Destination</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- activity html end -->
@endsection