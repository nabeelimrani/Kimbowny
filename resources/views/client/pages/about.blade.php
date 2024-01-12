@extends("layouts.app")
@section("content")

         <!-- Bradcrumb -->
         <section class="bradcrumb-area page-background">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="bradcrumb-box text-center">
                        <h1>About Us</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Bradcrumb -->
         <!-- About -->
         <section class="about-us-area page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                     <div class="about-box">
                        <div class="about-images">
                           <img src="{{asset('/assets/about.jpg')}}" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                     <div class="about-box">
                        <div class="about-content">
                           <div class="page-title">
                              <h2>About Kimbowny</h2>
                           </div>
                           <p class="theme-description">Our company's journey began a year ago when the founder adopted a Persian kitten who had specific dietary and litter preferences. This passion for pets led to the development of various initiatives aimed at improving animal well-being, which eventually expanded to include three more cats. Cats are known for their territorial nature and distinctive personalities, which resulted in issues with inappropriate elimination. As our founder transformed her passion into a business, she created an all-natural biodegradable litter and other pet supplies that benefit both pet owners and animals alike. Additionally, she embarked on a journey of rescuing pets throughout the UAE, making multiple visits to rescuers' homes and facilitating regional and international rehoming efforts.
While eagerly working towards providing the best quality of life for pets, our company aims to offer pet owners elegantly and sophisticatedly designed products. We believe that our pets reflect our pure and innocent love from our hearts. Kimbowny Company is located in Dubai Marina, UAE, and we have extensive experience in the pet essentials industry. We consider ourselves dedicated furparents and acknowledge the significance of animals' needs and well-being.
</p>




<h2>Our Goals</h2>
 <p class="theme-description">
The main goal of our business is to provide our customers, who are pet owners (Fur Parents), with high-quality products at affordable and reasonable prices. Our mission is to offer the best pet products available in the market while ensuring that it remains financially feasible for pet owners.
</p>



<h3>Buisness Goal</h3>


 <p class="theme-description">
The primary objective of our organization is to establish ourselves as the foremost distributor in the United Arab Emirates. Our strategy for accomplishing this involves providing exceptional products of unparalleled quality that adhere to the most stringent safety regulations, all while remaining competitively priced. Moreover, we have bold aspirations to extend our presence on a global scale, with a special focus on penetrating various other countries within the GCC region. Furthermore, we are determined to target specific markets in Asia, aiming to broaden our customer base and expand our reach.
</p>




 <p class="theme-description">
Thank you for the warm welcome! I am thrilled to join the esteemed Kimbowny Family and contribute towards bringing our collective vision to fruition. Let us collaborate diligently and strive for remarkable achievements together!</p>

                           <div class="about-btn">
                              <a class="theme-btn" href="{{route('contact')}}">Contact Us</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- About -->
         <!-- Our Client -->

         <!-- Our Client -->
         <!-- Service -->
         <section class="about-service-box page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="page-title text-center">
                        <h2>Reasons to shop with us</h2>
                        <p>Why we have regular and trusted pet parents because we are providing them what their pets want. Below are the specific reasons for which we are known for.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                     <div class="service-box text-center">
                        <div class="service-icon">
                           <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/shipping_compact.png" alt="">
                        </div>
                        <div class="service-content">
                           <h3 class="theme-title">Free Shipping & Return</h3>
                           <p class="theme-description">We know when you need it, so we send it directly to your pet free of charge. Now you can spend your Sunday watching Netflix, not in the pet food aisle.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                     <div class="service-box text-center">
                        <div class="service-icon">
                           <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/support_compact.png" alt="">
                        </div>
                        <div class="service-content">
                           <h3 class="theme-title">Online Support</h3>
                           <p class="theme-description">We are providing direct support 24/7. You can call us for anything related to your pet. We strive to provide solutions as quickly as we can.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                     <div class="service-box text-center">
                        <div class="service-icon">
                           <img src="https://theme.bitrixinfotech.com/pet-shop/demo1/assets/images/money_compact.png" alt="">
                        </div>
                        <div class="service-content">
                           <h3 class="theme-title">Money Return</h3>
                           <p class="theme-description">We have a straight policy in returning your money. If your pet doesn’t like the food or there’s any problem with it. You can freely ask us to return the food.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Service -->

@endsection
