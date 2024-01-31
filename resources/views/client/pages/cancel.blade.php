@extends("layouts.app")
@section("content")

  <!-- Bradcrumb -->
  <section class="bradcrumb-area page-background">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="bradcrumb-box text-center">
            <h1>Order Canceled</h1>
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
                  <h1>Order Has Been Canceled!</h1>
                  <p>We're sorry to hear that your order has been canceled. If you have any questions or concerns, please feel free to contact us.</p>
                </div>




                <p>Your order has been canceled. If you have any questions or concerns regarding your order, feel free to contact our customer support or WhatsApp us.</p>

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
