<section class="package-section">
    @if($latestPackages->count() > 0)
     <div class="container">
        <div class="section-heading">
           <div class="row align-items-end">
              <div class="col-lg-7">
                 <h5 class="dash-style">EXPLORE GREAT PLACES</h5>
                 <h2>POPULAR PACKAGES</h2>
              </div>

              <div class="col-lg-5">
               <div class="section-disc">
                 Discover the hidden gem of Tanzania with our Uluguru and Udzungwa Mountains hike ,Mikumi and Mwl.Julius Nyerere national Parks.Trek through lush forests,charming villages, and scenic viewpoints.
               </div>
            </div>

           </div>
         </div>

        <div class="package-inner">
           <div class="row">
             @foreach ($latestPackages as $package)
             <div class="col-lg-4 col-md-6"> 
                <div class="package-wrap d-flex flex-column h-100">
                   <figure class="feature-image">
                      <a href="{{ route('site-packages.show', $package->id) }}">
                        @if ($package->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $package->images->first()->url) }}" alt="Package Image">
                        @else
                        <img src="{{ asset('gta/images/no-image.png') }}" alt="No Image">
                        @endif
                     </a>
                   </figure>
                   <div class="package-price">
                      <h6>
                         <span>{{ $package->regular_price }}</span> /person
                      </h6>
                   </div>
                   <div class="package-content-wrap">
                      <div class="package-meta text-center">
                         <ul>
                            <li>
                               <i class="far fa-clock"></i>
                               {{ $package->days}} D/{{$package->nights }} N
                            </li>
                            <li>
                               <i class="fas fa-user-friends"></i>
                               People: {{ $package->size }}
                            </li>
                            <li>
                               <i class="fas fa-map-marker-alt"></i>
                               {{ ucfirst($package->destination) }}
                            </li>
                         </ul>
                      </div>
                      <div class="package-content">
                         <h3>
                            <a href="{{ route('site-packages.show', $package->id)}}">{{ ucfirst($package->title) }}</a>
                         </h3>
                         <div class="review-area">
                            <span class="review-text">(25 reviews)</span>
                            <div class="rating-start" title="Rated 5 out of 5">
                               <span style="width: 60%"></span>
                            </div>
                         </div>
                         <p>{{ (str_word_count($package->description) > 25) ? implode(' ', array_slice(explode(' ', ucfirst($package->description)), 0, 25)) . '...' : ucfirst($package->description) }}</p>
                         <div class="btn-wrap mt-auto d-flex justify-content-between">
                            <a href="#" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                            <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             @endforeach
              
           </div>
           <div class="btn-wrap text-center">
              <a href="{{ route('site-packages.index') }}" class="button-primary">VIEW ALL PACKAGES</a>
           </div>
        </div>
     </div>
     @endif
  </section>