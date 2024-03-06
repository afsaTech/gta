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
            @foreach ($discountedPackages as $discounted_package)
            <div class="col-md-6 col-lg-4">
               <div class="special-item">
                  <figure class="special-img">
                     <img src="{{ asset('gta/images/img9.jpg') }}" alt="">
                  </figure>
                  <div class="badge-dis">
                     <span>
                        <strong>{{ $discounted_package->discount }}%</strong>
                     </span>
                  </div>
                  <div class="special-content">
                     <div class="meta-cat">
                        <a href="#">{{ $discounted_package->destination }}</a>
                     </div>
                     <h3>
                        <a href="#">Experience the natural beauty of glacier</a>
                     </h3>
                     <div style="font-size: 14px;color:white">
                        Price:
                        <del> {{ discounted_package->regular_price }}</del>
                        <ins> {{ $discounted_package->regular_price * $discounted_package->discount }}</ins>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
             
          </div>
       </div>
    </div>
 </section>