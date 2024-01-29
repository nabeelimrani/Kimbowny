@extends("layouts.app")
@section("content")



    <!-- bradcrumb -->
    <section class="bradcrumb-area page-background">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="bradcrumb-box text-center">
              <h1>Wishlist</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- bradcrumb -->
    <!-- wishlist Product -->
    <section class="wishlist-product-area page-paddings">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="whislist-pro-box">
              <div class="theme-table">
                <table>
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                    <th>View Details</th>
                    <th>Remove</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($products as $product)
                    <tr>
                      <td>
                        <div class="cart-pro-box">
                          <div class="cart-pro-img"><img src="{{ asset($product->photo) }}" alt=""></div>
                          <div class="cart-pro-content">
                            <h3 class="theme-title">{{ $product->name }}</h3>
                            <div class="product-ratting">
                              <i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star ratting-active"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td><span class="cart-subtotal">${{ $product->sale }}</span></td>
                      <td class="pro-stock {{ $product->quantity > 1 ? 'in-stock' : 'out-stock' }}">{{ $product->quantity > 1 ? 'In Stock' : 'Out of Stock' }}</td>
                      <td><a href="{{url($product->pagelink())}}" class="theme-btn">View Details</a></td>
                      <td><button class="cart-tras-btn slide-remove-btn" data-id="{{ $product->id }}"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5"><h2>No products found.</h2></td>
                    </tr>
                  @endforelse

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- wishlist Product -->



@endsection
