 <section class="slider-box-area">

     <div class="slider-area">
         @forelse($banners as $banner)
             <div class="banner-slider banner-one">
                 <div class="banner-box">
                     <div class="container">
                         <div class="row">
                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
                                 <div class="banner-description-box">

                                     <div class="banner-description">
                                         <span class="wow fadeInUp center" data-wow-delay="0.2s">*Save
                                             {{ $banner->discount }}% Off*</span>
                                         <h2 class="wow fadeInUp center" data-wow-delay="0.4s">{{ $banner->title }}</h2>

                                         <p class="wow fadeInUp center" data-wow-delay="0.8s">{!! $banner->description !!}
                                         </p>
                                         <div class="slider-btn wow fadeInUp center" data-wow-delay="0.6s">
                                             <span class="wow fadeInUp center"
                                                 data-wow-delay="0.2s">{{ $banner->promo_code }}</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
                                 <div class="banner-slide-images wow pulse" data-wow-iteration="3"
                                     data-wow-duration="0.15">
                                     <img src="{{ asset('storage/banner_images/' . $banner->image) }}" alt="">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         @empty
         @endforelse
     </div>
 </section>
