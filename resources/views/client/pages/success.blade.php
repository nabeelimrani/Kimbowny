@extends("layouts.app")
@section("content")


         <!-- Bradcrumb -->
         <section class="bradcrumb-area page-background">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="bradcrumb-box text-center">
                        <h1>Order Placed</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Bradcrumb -->
         <!-- Page Content -->
         <section class="page-content-area page-paddings">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="page-content">

                       <div class="card my-5 p-5">
                         <div class="card-body">
                           <div class="mb-5 p-3">
                             <h1 >Order Placed Successfully!</h1>
                             <p>Thank you for choosing Kimbowny Pet Store . Your order has been successfully placed. Below are the details of your order:</p>
                           </div>


                           <div class="order-details">
                             <h2 class="mb-3">Order Details</h2>

                             <ul>
                               @if($order)
                                 <li class="my-2"><strong>Date:</strong> {{$order->created_at->format('j F Y')}}</li>
                                 <li class="my-2"><strong>Total Amount:</strong> AED :
                                   {{$order->bill}}
                                 </li>
                                 <!-- Add more details such as shipping address, items purchased, etc. -->
                               @endif
                             </ul>
                           </div>

                           <p>Your order is now being processed . If you have any questions or concerns regarding your order, feel free to contact our customer support or Whatsapp us.</p>

                           <div class="actions">
                             <a class="btn custom-btn" href="{{url('/')}}">Continue Shopping</a>
                             <a class="btn custom-btn btn-light" href="{{url('/contact')}}">Contact Customer Support</a>
                           </div>
                         </div>
                       </div>

                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Page Content -->


@endsection
