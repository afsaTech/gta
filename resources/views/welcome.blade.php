@extends('layout.app')

@section('content')

<style>
/* Home section Start */
.banner-content{
  text-align: center;
  /* padding-top: 10px; */
}

.banner-content h5{
  color: white;
  font-size: 38px;
  font-weight: 500;
  text-shadow: 0px 1px 1px #06522a;
  font-family: 'Kaushan Script', cursive;
}

.banner-content h1{
  color: white;
  font-size:38px;
  font-weight: 600;
  text-shadow: 0px 1px 1px #06522a;
  margin-top: 5px;
}

.changecontent::after{
  content: ' ';
  color: goldenrod;
  text-shadow: 0px 1px 1px #06522a;
  animation: changetext 30s infinite linear;
}

@keyframes changetext{
  0%{content:"Serengeti";}
  10%{content:"Ngorongoro";}
  20%{content:"Manyara";}
  30%{content:"Mikumi";}
  40%{content:"Mount Kilimanjaro";}
  50%{content:"Ruwaha National park";}
  60%{content:"Uluguru Mountains";}
  70%{content:"Udzungwa Montain ranges";}
  80%{content:"Zanzibar";}
  90%{content:"Dodoma";}
  100%{content:"Lake Victoria";}
}

.banner-content p{
  color: white;
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 2px;
  text-shadow: 0px 1px 1px #06522a;
  margin-top: 5px;
  margin-bottom: 30px;
}

.banner-content button{
  padding: 10px;
  width: auto;
  background:#06522a;
  color:white;
  letter-spacing:2px;
  font-weight: 500;
  border: none;
  border-radius: 3px;
  transition: 0.5s;
}
   </style>

 <!-- Home slider html start -->
 <section class="home-slider-section">
    <div class="home-slider">
       <div class="home-banner-items">
          <div class="banner-inner-wrap" style="background-image: url({{asset('gta/images/slider-banner-1.jpg')}});">
          </div>
          <div class="banner-content-wrap">
             <div class="container">
                <div class="banner-content text-center">
                  <h5>Welcome to Tanzania</h5>
                  <h1>Visit <span class="changecontent"></span></h1>
                  <p>Come join us for an unforgettable adventure in the heart of Africa</p>
                   <a href="#" class="button-primary">CONTINUE READING</a>
                </div>
             </div>
          </div>
          <div class="overlay"></div>
       </div>
       <div class="home-banner-items">
         <div class="banner-inner-wrap" style="background-image: url({{asset('gta/images/slider-banner-2.jpg')}});">
         </div>
         <div class="banner-content-wrap">
            <div class="container">
               <div class="banner-content text-center">
                 <h5>Welcome to Tanzania</h5>
                 <h1>Visit <span class="changecontent"></span></h1>
                 <p>Come join us for an unforgettable adventure in the heart of Africa</p>
                  <a href="#" class="button-primary">CONTINUE READING</a>
               </div>
            </div>
         </div>
         <div class="overlay"></div>
      </div>
    </div>
 </section>
 <!-- slider html start -->
 <!-- Home search field html start -->
 <div class="trip-search-section shape-search-section">
    <div class="slider-shape"></div>
    <div class="container">
       <div class="trip-search-inner white-bg d-flex">
          <div class="input-group">
             <label> Search Destination* </label>
             <input type="text" name="s" placeholder="Enter Destination">
          </div>
          <div class="input-group">
             <label> Pax Number* </label>
             <input type="text" name="s" placeholder="No.of People">
          </div>
          <div class="input-group width-col-3">
             <label> Checkin Date* </label>
             <i class="far fa-calendar"></i>
             <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
          </div>
          <div class="input-group width-col-3">
             <label> Checkout Date* </label>
             <i class="far fa-calendar"></i>
             <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off"
                readonly="readonly">
          </div>
          <div class="input-group width-col-3">
             <label class="screen-reader-text"> Search </label>
             <input type="submit" name="travel-search" value="INQUIRE NOW">
          </div>
       </div>
    </div>
 </div>
 <!-- search search field html end -->
 <section class="destination-section">
    <div class="container">
       <div class="section-heading">
          <div class="row align-items-end">
             <div class="col-lg-7">
                <h5 class="dash-style">POPULAR DESTINATION</h5>
                <h2>TOP NOTCH DESTINATION</h2>
             </div>
             <div class="col-lg-5">
                <div class="section-disc">
                  Explore Tanzania's top-notch destinations for unforgettable adventures, 
                  from wildlife safaris to pristine beaches. Your journey begins with us!
                </div>
             </div>
          </div>
       </div>
       <div class="destination-inner destination-three-column">
          <div class="row">
             <div class="col-lg-7">
                <div class="row">
                   <div class="col-sm-6">
                      <div class="desti-item overlay-desti-item">
                         <figure class="desti-image">
                            <img src="{{asset('gta/images/img1.jpg')}}" alt="">
                         </figure>
                         <div class="meta-cat bg-meta-cat">
                            <a href="#">THAILAND</a>
                         </div>
                         <div class="desti-content">
                            <h3>
                               <a href="#">Disney Land</a>
                            </h3>
                            <div class="rating-start" title="Rated 5 out of 4">
                               <span style="width: 53%"></span>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <div class="desti-item overlay-desti-item">
                         <figure class="desti-image">
                            <img src="{{asset('gta/images/img2.jpg')}}" alt="">
                         </figure>
                         <div class="meta-cat bg-meta-cat">
                            <a href="#">NORWAY</a>
                         </div>
                         <div class="desti-content">
                            <h3>
                               <a href="#">Besseggen Ridge</a>
                            </h3>
                            <div class="rating-start" title="Rated 5 out of 5">
                               <span style="width: 100%"></span>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-lg-5">
                <div class="row">
                   <div class="col-md-6 col-xl-12">
                      <div class="desti-item overlay-desti-item">
                         <figure class="desti-image">
                            <img src="{{asset('gta/images/img3.jpg')}}" alt="">
                         </figure>
                         <div class="meta-cat bg-meta-cat">
                            <a href="#">NEW ZEALAND</a>
                         </div>
                         <div class="desti-content">
                            <h3>
                               <a href="#">Oxolotan City</a>
                            </h3>
                            <div class="rating-start" title="Rated 5 out of 5">
                               <span style="width: 100%"></span>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-6 col-xl-12">
                      <div class="desti-item overlay-desti-item">
                         <figure class="desti-image">
                            <img src="{{asset('gta/images/img4.jpg')}}" alt="">
                         </figure>
                         <div class="meta-cat bg-meta-cat">
                            <a href="#">SINGAPORE</a>
                         </div>
                         <div class="desti-content">
                            <h3>
                               <a href="#">Marina Bay Sand City</a>
                            </h3>
                            <div class="rating-start" title="Rated 5 out of 4">
                               <span style="width: 60%"></span>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="btn-wrap text-center">
             <a href="#" class="button-primary">MORE DESTINATION</a>
          </div>
       </div>
    </div>
 </section>
 <!-- Home packages section html start -->
 <section class="package-section">
   @if($latestPackages->count()>0)
    <div class="container">
       <div class="section-heading text-center">
          <div class="row">
             <div class="col-lg-8 offset-lg-2">
                <h5 class="dash-style">EXPLORE GREAT PLACES</h5>
                <h2>POPULAR PACKAGES</h2>
                <p>Discover the hidden gem of Tanzania with our Uluguru and Udzungwa Mountains hike ,Mikumi and Mwl.Julius Nyerere national Parks.Trek through lush forests,charming villages, and scenic viewpoints.</p>
             </div>
          </div>
       </div>
       <div class="package-inner">
          <div class="row">
            @foreach ($latestPackages as $package)
            <div class="col-lg-4 col-md-6">
               <div class="package-wrap">
                  <figure class="feature-image">
                     <a href="{{url('/package',$package->id)}}">
                        <img src="{{($package->image)?asset('storage/'.$package->image):asset('images/no-image.png')}}" alt="Package Image">
                     </a>
                  </figure>
                  <div class="package-price">
                     <h6>
                        <span> @money($package->regular_price) </span> /person
                     </h6>
                  </div>
                  <div class="package-content-wrap">
                     <div class="package-meta text-center">
                        <ul>
                           <li>
                              <i class="far fa-clock"></i>
                              {{$package->days}} D/{{$package->nights}} N
                           </li>
                           <li>
                              <i class="fas fa-user-friends"></i>
                              People: {{$package->size}}
                           </li>
                           <li>
                              <i class="fas fa-map-marker-alt"></i>
                              {{$package->destination}}
                           </li>
                        </ul>
                     </div>
                     <div class="package-content">
                        <h3>
                           <a href="{{url('/package',$package->id)}}">{{$package->title}}</a>
                        </h3>
                        <div class="review-area">
                           <span class="review-text">(25 reviews)</span>
                           <div class="rating-start" title="Rated 5 out of 5">
                              <span style="width: 60%"></span>
                           </div>
                        </div>
                        <p>@description($package->description)</p>
                        <div class="btn-wrap">
                           <a href="#" class="button-text width-6">Book Now<i
                                 class="fas fa-arrow-right"></i></a>
                           <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
             
          </div>
          <div class="btn-wrap text-center">
             <a href="{{url('/packages')}}" class="button-primary">VIEW ALL PACKAGES</a>
          </div>
       </div>
    </div>
    @endif
 </section>
 <!-- packages html end -->
 <!-- Home callback section html start -->
 <section class="callback-section">
    <div class="container">
       <div class="row no-gutters align-items-center">
          <div class="col-lg-5">
             <div class="callback-img" style="background-image: url({{asset('gta/images/img2.jpg')}});">
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
                   <h2>REMEMBER US!!</h2>
                   <p>Explore Tanzania with Go Tanzania Adventure.
                      Create unforgettable memories with us as you discover the beauty and culture of this amazing destination.</p>
                </div>
                <div class="callback-counter-wrap">
                   <div class="counter-item">
                      <div class="counter-icon">
                         <img src="{{asset('gta/icons/icon1.png')}}" alt="">
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
                         <img src="{{asset('gta/icons/icon2.png')}}" alt="">
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
                         <img src="{{asset('gta/icons/icon3.png')}}" alt="">
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
                         <img src="{{asset('gta/icons/icon4.png')}}" alt="">
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
                      <img src="{{asset('gta/icons/icon5.png')}}" alt="">
                   </div>
                   <div class="support-content">
                      <h4>Our 24/7 Emergency Phone Services</h4>
                      <h3>
                         <a href="#">Call: +255 (078) 6627 05</a>
                      </h3>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- callback html end -->
 <!-- Home activity section html start -->
 <section class="activity-section">
    <div class="container">
       <div class="section-heading text-center">
          <div class="row">
             <div class="col-lg-8 offset-lg-2">
                <h5 class="dash-style">TRAVEL BY ACTIVITY</h5>
                <h2>ADVENTURE & ACTIVITY</h2>
                <p>Discover untamed wilderness, conquer towering peaks, 
                  and embark on thrilling safaris with Go Tanzania Adventure. Your journey begins here.</p>
             </div>
          </div>
       </div>
       <div class="activity-inner row">
          <div class="col-lg-2 col-md-4 col-sm-6">
             <div class="activity-item">
                <div class="activity-icon">
                   <a href="#">
                      <img src="{{asset('gta/icons/icon6.png')}}" alt="">
                   </a>
                </div>
                <div class="activity-content">
                   <h4>
                      <a href="#">Adventure</a>
                   </h4>
                   <p>{{15}} Destination</p>
                </div>
             </div>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
             <div class="activity-item">
                <div class="activity-icon">
                   <a href="#">
                      <img src="{{asset('gta/icons/icon10.png')}}" alt="">
                   </a>
                </div>
                <div class="activity-content">
                   <h4>
                      <a href="#">Trekking</a>
                   </h4>
                   <p>{{12}} Destination</p>
                </div>
             </div>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
             <div class="activity-item">
                <div class="activity-icon">
                   <a href="#">
                      <img src="{{asset('gta/icons/icon9.png')}}" alt="">
                   </a>
                </div>
                <div class="activity-content">
                   <h4>
                      <a href="#">Camp Fire</a>
                   </h4>
                   <p>{{7}} Destination</p>
                </div>
             </div>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
             <div class="activity-item">
                <div class="activity-icon">
                   <a href="#">
                      <img src="{{asset('gta/icons/icon8.png')}}" alt="">
                   </a>
                </div>
                <div class="activity-content">
                   <h4>
                      <a href="#">Off Road</a>
                   </h4>
                   <p>{{15}} Destination</p>
                </div>
             </div>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
             <div class="activity-item">
                <div class="activity-icon">
                   <a href="#">
                      <img src="{{asset('gta/icons/icon7.png')}}" alt="">
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
                      <img src="{{asset('gta/icons/icon11.png')}}" alt="">
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
 <!-- Home special section html start -->
 <section class="special-section">
    <div class="container">
       <div class="section-heading text-center">
          <div class="row">
             <div class="col-lg-8 offset-lg-2">
                <h5 class="dash-style">TRAVEL OFFER & DISCOUNT</h5>
                <h2>SPECIAL TRAVEL OFFER</h2>
                <p>Explore Tanzania's breathtaking landscapes and wildlife with our special travel offer. 
                  Experience adventure like never before with Go Tanzania Adventure Tourism.</p>
             </div>
          </div>
       </div>
       <div class="special-inner">
          <div class="row">
             <div class="col-md-6 col-lg-4">
                <div class="special-item">
                   <figure class="special-img">
                      <img src="{{asset('gta/images/img9.jpg')}}" alt="">
                   </figure>
                   <div class="badge-dis">
                      <span>
                         <strong>20%</strong>
                      </span>
                   </div>
                   <div class="special-content">
                      <div class="meta-cat">
                         <a href="#">CANADA</a>
                      </div>
                      <h3>
                         <a href="#">Experience the natural beauty of glacier</a>
                      </h3>
                      <div class="package-price">
                         Price:
                         <del>$1500</del>
                         <ins>$1200</ins>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-6 col-lg-4">
                <div class="special-item">
                   <figure class="special-img">
                      <img src="{{asset('gta/images/img10.jpg')}}" alt="">
                   </figure>
                   <div class="badge-dis">
                      <span>
                         <strong>15%</strong>
                      </span>
                   </div>
                   <div class="special-content">
                      <div class="meta-cat">
                         <a href="#">NEW ZEALAND</a>
                      </div>
                      <h3>
                         <a href="#">Trekking to the mountain camp site</a>
                      </h3>
                      <div class="package-price">
                         Price:
                         <del>$1300</del>
                         <ins>$1105</ins>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-6 col-lg-4">
                <div class="special-item">
                   <figure class="special-img">
                      <img src="{{asset('gta/images/img11.jpg')}}" alt="">
                   </figure>
                   <div class="badge-dis">
                      <span>
                         <strong>15%</strong>
                      </span>
                   </div>
                   <div class="special-content">
                      <div class="meta-cat">
                         <a href="#">MALAYSIA</a>
                      </div>
                      <h3>
                         <a href="#">Sunset view of beautiful lakeside city</a>
                      </h3>
                      <div class="package-price">
                         Price:
                         <del>$1800</del>
                         <ins>$1476</ins>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- special html end -->
 <!-- Home special section html start -->
 <section class="best-section">
    <div class="container">
       <div class="row">
          <div class="col-lg-5">
             <div class="section-heading">
                <h5 class="dash-style">OUR TOUR GALLERY</h5>
                <h2>BEST TRAVELER'S SHARED PHOTOS</h2>
                <p><p style="text-align: justify">Absolutely stunning! Go Tanzania Adventure truly delivered an unforgettable experience.
                  From close encounters with wildlife to breathtaking landscapes,this trip exceeded all expectations.
                  Highly reccommended for anyone seeking
                  adventure and natural beauty! &#128247;
                  #Go Tanzania Adventure #TravelMemories</p>
             </div>
             <figure class="gallery-img">
                <img src="{{asset('gta/images/img12.jpg')}}" alt="">
             </figure>
          </div>
          <div class="col-lg-7">
             <div class="row">
                <div class="col-sm-6">
                   <figure class="gallery-img">
                      <img src="{{asset('gta/images/img13.jpg')}}" alt="">
                   </figure>
                </div>
                <div class="col-sm-6">
                   <figure class="gallery-img">
                      <img src="{{asset('gta/images/img14.jpg')}}" alt="">
                   </figure>
                </div>
             </div>
             <div class="row">
                <div class="col-12">
                   <figure class="gallery-img">
                      <img src="{{asset('gta/images/img15.jpg')}}" alt="">
                   </figure>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- best html end -->
 <!-- Home subscribe section html start -->
 <section class="subscribe-section mt-4" style="background-image: url({{asset('gta/images/img16.jpg')}});">
    <div class="container">
       <div class="row">
          <div class="col-lg-7">
             <div class="section-heading section-heading-white">
                <h5 class="dash-style">HOLIDAY PACKAGE OFFER</h5>
                <h2>HOLIDAY SPECIAL 25% OFF !</h2>
                <h4>Sign up now to recieve hot special offers and information about the best tour packages,
                   updates and discounts !!</h4>
                <div class="newsletter-form">
                   <form>
                      <input type="email" name="s" placeholder="Your Email Address">
                      <input type="submit" name="signup" value="SIGN UP NOW!">
                   </form>
                </div>
                <p>Embark on an unforgettable adventure with Go Tanzania! Book now and enjoy our holiday special, 
                  25% off your dream safari experience. Don't miss out! sign up today.</p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- subscribe html end -->
 <!-- Home blog section html start -->
 <section class="blog-section">
    <div class="container">
       <div class="section-heading text-center">
          <div class="row">
             <div class="col-lg-8 offset-lg-2">
                <h5 class="dash-style">FROM OUR BLOG</h5>
                <h2>OUR RECENT POSTS</h2>
                <p>Explore our recent posts to discover thrilling adventures, breathtaking landscapes,
                   and unique experiences in Tanzania. Your unforgettable journey begins here!</p>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6 col-lg-4">
             <article class="post">
                <figure class="feature-image">
                   <a href="#">
                      <img src="{{asset('gta/images/img17.jpg')}}" alt="">
                   </a>
                </figure>
                <div class="entry-content">
                   <h3>
                      <a href="#">Life is a beautiful journey not a destination</a>
                   </h3>
                   <div class="entry-meta">
                      <span class="byline">
                         <a href="#">Demoteam</a>
                      </span>
                      <span class="posted-on">
                         <a href="#">August 17, 2021</a>
                      </span>
                      <span class="comments-link">
                         <a href="#">No Comments</a>
                      </span>
                   </div>
                </div>
             </article>
          </div>
          <div class="col-md-6 col-lg-4">
             <article class="post">
                <figure class="feature-image">
                   <a href="#">
                      <img src="{{asset('gta/images/img18.jpg')}}" alt="">
                   </a>
                </figure>
                <div class="entry-content">
                   <h3>
                      <a href="#">Take only memories, leave only footprints</a>
                   </h3>
                   <div class="entry-meta">
                      <span class="byline">
                         <a href="#">Demoteam</a>
                      </span>
                      <span class="posted-on">
                         <a href="#">August 17, 2021</a>
                      </span>
                      <span class="comments-link">
                         <a href="#">No Comments</a>
                      </span>
                   </div>
                </div>
             </article>
          </div>
          <div class="col-md-6 col-lg-4">
             <article class="post">
                <figure class="feature-image">
                   <a href="#">
                      <img src="{{asset('gta/images/img19.jpg')}}" alt="">
                   </a>
                </figure>
                <div class="entry-content">
                   <h3>
                      <a href="#">Journeys are best measured in new friends</a>
                   </h3>
                   <div class="entry-meta">
                      <span class="byline">
                         <a href="#">Demoteam</a>
                      </span>
                      <span class="posted-on">
                         <a href="#">August 17, 2021</a>
                      </span>
                      <span class="comments-link">
                         <a href="#">No Comments</a>
                      </span>
                   </div>
                </div>
             </article>
          </div>
       </div>
    </div>
 </section>
 <!-- blog html end -->
 <!-- Home contact details section html start -->
 <section class="contact-section">
    <div class="container">
       <div class="row">
          <div class="col-lg-4">
             <div class="contact-img" style="background-image: url({{asset('gta/images/img19.jpg')}});">
             </div>
          </div>
          <div class="col-lg-8">
             <div class="contact-details-wrap">
                <div class="row">
                   <div class="col-sm-4">
                      <div class="contact-details">
                         <div class="contact-icon">
                            <img src="{{asset('gta/icons/icon12.png')}}" alt="">
                         </div>
                         <ul>
                            <li>
                               <a href="#">info@gta.co.tz  </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="col-sm-4">
                      <div class="contact-details">
                         <div class="contact-icon">
                            <img src="{{asset('gta/icons/icon13.png')}}" alt="">
                         </div>
                         <ul>
                            <li>
                               <a href="#">+255 (078) 6627 05</a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="col-sm-4">
                      <div class="contact-details">
                         <div class="contact-icon">
                            <img src="{{asset('gta/icons/icon14.png')}}" alt="">
                         </div>
                         <ul>
                            <li>
                               Morogoro, Tanzania
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
             <div class="contact-btn-wrap">
                <h3>LET'S JOIN US FOR MORE UPDATE !!</h3>
                <a href="#" class="button-primary">LEARN MORE</a>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--  contact details html end -->