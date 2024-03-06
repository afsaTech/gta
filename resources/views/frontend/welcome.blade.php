@extends(config('system.paths.frontend.layout') . 'master')

@section('css')
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

#slider-banner-1 {
  background-image: url("{{ asset('gta/images/slider-banner-1.jpg') }}");
}

#slider-banner-2 {
  background-image: url("{{ asset('gta/images/slider-banner-2.jpg') }}");
}

/* Subscribe section */
#subscribe-section {
  background-image: url("{{ asset('gta/images/img16.jpg') }}");
}

/* Callback section */
#callback-img {
  background-image: url("{{asset('gta/images/img2.jpg')}}");
}
</style>
@endsection('css')

@section('content')
 <!-- Home slider html start -->
 @include(config('system.paths.frontend.sections') . 'slider')
 <!-- slider html start -->

 <!-- Home search field html start -->
 @include(config('system.paths.frontend.sections') . 'search_field')
 <!-- search search field html end -->

 <!-- Top notch destinations html start -->
 @include(config('system.paths.frontend.sections') . 'top_destinations')
 <!-- destination html end -->

 <!-- Home packages section html start -->
 @include(config('system.paths.frontend.sections') . 'packages')
 <!-- packages html end -->

 <!-- Home callback section html start -->
 @include(config('system.paths.frontend.sections') . 'callback')
 <!-- callback html end -->

 <!-- Home activity section html start -->
 @include(config('system.paths.frontend.sections') . 'activities')
 <!-- activity html end -->

 <!-- Home special section html start -->
 @include(config('system.paths.frontend.sections') . 'special_offer')
 <!-- special html end -->

 <!-- Home tour gallery section html start -->
 @include(config('system.paths.frontend.sections') . 'gallery')
 <!-- gallery html end -->

 <!-- Home subscribe section html start -->
 @include(config('system.paths.frontend.sections') . 'subscribe')
 <!-- subscribe html end -->

 <!-- Home blog section html start -->
 @include(config('system.paths.frontend.sections') . 'blog')
 <!-- blog html end -->

 <!-- Home contact details section html start -->
 @include(config('system.paths.frontend.sections') . 'contact')
 <!--  contact details html end -->
 @endsection