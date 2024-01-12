@extends("layouts.app")
@section("content")

         <!-- Bradcrumb -->

         <!-- Bradcrumb -->
         <section class="bradcrumb-area page-background">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="bradcrumb-box text-center">
                        <h1>Contact Us</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Bradcrumb -->
         <!-- Contact -->
         <section class="contact-area page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                     <div class="contact-box text-center">
                        <div class="contact-box-ico">
                           <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3 class="theme-title">Phone</h3>
                        <p class="theme-description">+971 52 489 4820</p>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                     <div class="contact-box text-center">
                        <div class="contact-box-ico">
                           <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="theme-title">Email</h3>
                        <p class="theme-description">support@kimbownypetstore.com</p>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                     <div class="contact-box text-center">
                        <div class="contact-box-ico">
                           <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="theme-title">Address</h3>
                        <p class="theme-description">La Riviera Tower Al Marsa street Dubai Marina, Dubai,United Arab Emirates.</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Contact -->
         <!-- Contact Form -->
         <section class="contact-form-area page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="page-title text-center">
                        <h2>Leave A Message</h2>
                        <p>If you have any type of quarry regarding our company then, leave us a message here we will keep in touch with you as soon as possible.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                     <div class="contact-box-form">
                        <form id="send-mail">
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <input type="text" name="fname" class="form-control" placeholder="First Name" required="">
                                    <i class="fas fa-user"></i>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required="">
                                    <i class="fas fa-user"></i>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required="">
                                    <i class="fas fa-envelope"></i>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 col-12">
                                 <div class="theme-input-box">
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Phone Number" required="">
                                    <i class="fas fa-phone-alt"></i>
                                 </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="theme-input-box">
                                    <textarea rows="6" class="form-control" name="msg"></textarea>
                                 </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="theme-input-box">
                                    <button class="theme-btn theme-submit" type="button">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                     <div class="contact-map-area">
                        <div class="contact-map-box">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.8459074945367!2d55.13596581081044!3d25.073211377698392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6cab44f946b7%3A0x57248788625ce895!2sLa%20Riviera%20Tower!5e0!3m2!1sen!2s!4v1704784259881!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Contact Form -->

@endsection
