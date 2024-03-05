<section class="destination-section">
   @if($topNotches->count() > 0)
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

       <div class="destination-inner">
          <div class="row">
               @foreach($topNotches as $topNotch)
               <div class="col-lg-4 col-md-6">

                      <div class="desti-item overlay-desti-item">
                           <figure class="desti-image">
                              @if ($topNotch->image_url != null)
                              <img src="{{ asset('storage/' . $topNotch->image_url) }}" alt="Destination Image">
                              @else
                              <img src="{{ asset('gta/images/no-image.png') }}" alt="No Image">
                              @endif 
                           </figure>
                           <div class="meta-cat bg-meta-cat">
                              <a href="#">{{ $topNotch->location }}</a>
                           </div>
                           <div class="desti-content">
                              <h3>
                                 <a href="#">{{ $topNotch->description }}</a>
                              </h3>
                              <div class="rating-start" title="Rated 5 out of 4">
                                 <span style="width: 53%;"></span>
                              </div>
                           </div>
                      </div>
                      
               </div>
               @endforeach
            </div>
         </div>


      </div>

      <div class="btn-wrap text-center">
         <a href="#" class="button-primary">MORE DESTINATION</a>
      </div>
      
   @endif
 </section>