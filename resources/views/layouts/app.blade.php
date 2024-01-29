<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>KimBowny Buy Pet Products Online With Best Prices | Pet Store</title>
      <meta name="Keywords" content="Pet shop, online pet shop, pet food, online pet food, best pet food">
      <meta name="Description" content="We are leading online pet store for all your pet supply needs. We deliver our products all over the world with the best prices available.">
      <meta name="twitter:card" content="summary">
      <meta name="twitter:description" content="We are leading online pet store for all your pet supply needs. We deliver our products all over the world with the best prices available.">
      <meta name="twitter:title" content="Buy Pet Products Online With Best Prices | Pet Shop">
      <meta name="twitter:image" content="assets/images/meta-banner.jpg">
      <meta property="og:locale" content="en_US">
      <meta property="og:type" content="article">
      <meta property="og:title" content="Buy Pet Products Online With Best Prices | Pet Shop">
      <meta property="og:description" content="We are leading online pet store for all your pet supply needs. We deliver our products all over the world with the best prices available.">
      <meta property="og:url" content="">
      <meta property="og:site_name" content="Pet Shop">
      <meta property="og:image" content="assets/images/meta-banner.jpg">
      <meta property="og:image:secure_url" content="assets/images/meta-banner.jpg">
      <meta name="robots" content="noindex,nofollow">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <link rel="shortcut icon" href="{{asset('assets/fav.png')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
      <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <!-- Scripts -->

</head>
<body>
    @include("client.components.header")
   <div class="page-main">
            @yield('content')
    </div>
     @include("client.components.footer")
     @include("client.components.sideCart")
     @include("client.components.sideWishlist")
     <div class="theme-preloader">
         <span><img src="{{asset('assets/images/dog-preloader.gif')}}" alt=""></span>
      </div>
      <a id="page-up" class="page-up-box"><i class="fas fa-arrow-alt-circle-up"></i></a>
</body>
      <script src="{{asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('assets/js/wow.min.js')}}"></script>
      <script src="{{asset('assets/js/jquery.cookie.min.js')}}"></script>
      <script src="{{asset('/assets/js/custom.js')}}"></script>
      <script src="{{asset('sweetAlert/sweetAlert.min.js')}}" ></script>
</html>
<script>
  var currentUrl = "{{ url()->current() }}";

  $(document).on("blur","#checkoutemail",function (){
    var email = $(this).val();
    var data = {
      email: email
    };

    var success = function (response) {
      if (response == 1) {
        $("#returning").addClass("d-block");

        $('#checkoutform input, #checkoutform select, #checkoutform textarea,#checkoutform button').prop('disabled', true);


        Swal.fire({

          title:"Your are Already Registered With Our website please login to auto fill the information",
          showConfirmButton: true,

        });
      }
      }

    ajaxcall('/checkEmail',data,'post',success);
  });
  $(document).on("change","#checkoutcountry",function (){
    var val = $(this).val();
    if(val == "Saudi Arabia")
    {

      var val2=$("#shippingcheck").html();
      var val3=$("#totalcheck").html();
      var val4=$("#actualprice").html();


        $("#shippingcheck").html('AED : 30.00');
        $("#totalcheck").html(parseInt(val4)+30);

    }
    if(val == "United Arab Emirates")
    {

      var val2=$("#shippingcheck").html();
      var val3=$("#totalcheck").html();
      var val4=$("#actualprice").html();

      if(val2 != 'Free')
      {

        if(parseInt(val4)<100) {
          $("#shippingcheck").html('AED : 10.00');
          $("#totalcheck").html(parseInt(val4) + 10);
        }
        else{
          $("#shippingcheck").html('Free');
          $("#totalcheck").html(val4);

        }
      }
    }
    var data = {
      val: val
    };

    var success = function (response) {

      $("#checkoutcity").html(response.output);

      }

    ajaxcall('/getcities',data,'post',success);
  });
  $(document).on("submit", "#updateAccount", function (e) {
    e.preventDefault();
    $("div[id*='error']").html("");

    var form = $(this);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: "/updateinfo",
      method: 'post',
      dataType: 'json',
      data: form.serializeArray(),
      error: function (request, status, error) {
        if (request.responseJSON && request.responseJSON.errors) {
          $.each(request.responseJSON.errors, function (index, v) {
            var divid = "error-" + index;
            $("#" + divid).addClass("text-danger").html(v);
          });
        }

        return false;
      },
      success: function (data) {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Information Has Been Changed",
          showConfirmButton: false,
          timer: 1500
        });

      },
    });
  });
  $(document).on("submit", "#updatePassword", function (e) {
    e.preventDefault();
    $("div[id*='error']").html("");

    var form = $(this);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: "updateCrediantials",
      method: 'post',
      dataType: 'json',
      data: form.serializeArray(),
      error: function (request, status, error) {
        if (request.responseJSON && request.responseJSON.errors) {
          $.each(request.responseJSON.errors, function (index, v) {
            var divid = "error-" + index;
            $("#" + divid).addClass("text-danger").html(v);
          });
        }

        return false;
      },
      success: function (data) {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Password Has Been Changed",
          showConfirmButton: false,
          timer: 1500
        });
        form.trigger("reset");
      },
    });
  });
  $(document).on("submit", "#addToCartProductPage", function (e) {
    e.preventDefault();
    $("div[id*='error']").html("");

    var form = $(this);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: "/addToCartProductPage",
      method: 'post',
      dataType: 'json',
      data: form.serializeArray(),
      error: function (request, status, error) {
        if (request.responseJSON && request.responseJSON.errors) {
          $.each(request.responseJSON.errors, function (index, v) {
            var divid = "error-" + index;
            $("#" + divid).addClass("text-danger").html(v);
          });
        }

        return false;
      },
      success: function (data) {

          showMessage("Product has Been Added To Cart");
          loadcart();
      },
    });
  });
  $(document).on("click","#clearCart",function(){
    var success=function (data)
    {
      location.reload();
    }
    var data={}
  ajaxcall('/clearCart',data,'post',success)
  });
  $(document).on("click",".slide-remove-btn",function(){

    var success=function (data)
    {
      if (currentUrl === "{{ url('/wishlist') }}")
      {
        location.reload();
      }
      loadWishlist();
    }
    var data={
      id:$(this).data('id'),
    }
  ajaxcall('/deletewishlist',data,'post',success)
  });

  $(document).on("click",".addtowish",function(){
    var success=function (data)
    {
      loadWishlist();
      if(data==1) {
        showMessage("Product Has Been Added to WishList");
      }
      else
      {
        showMessage("Product is already in WishList");
      }
    }
    var data={
      id:$(this).data("id"),
    }
    ajaxcall('/addToWishlist',data,'post',success)
  });



  $(document).on("click", ".chngeqtypostive", function () {

    var id = $(this).data("id");
    var i=$(this).data('index');
    var qty = $("#row"+i).find(".quantity-input").val();
    var unit=$("#row"+i).find("#unit").html();
    var oldsub=$("#row"+i).find(".cart-subtotal").html();
    var sub=$("#row"+i).find(".cart-subtotal").html(parseInt(oldsub)+parseInt(unit));
    var oldsubtotal=$("#subtotal").text();
    var newsubtotal=$("#subtotal").html(parseInt(oldsubtotal)+parseInt(unit));
    var success = function (data) {
          loadcart();
     };

    var data = {
        id: id,
        qty: qty,
     };

    ajaxcall('/addToCart', data, 'post', success);
  });
  $(document).on("click", ".chngeqtynegative", function () {

    var id = $(this).data("id");
    var i=$(this).data('index');
    var qty = $("#row"+i).find(".quantity-input").val();
      var unit = $("#row" + i).find("#unit").html();
      var oldsub = $("#row" + i).find(".cart-subtotal").html();
      if(parseInt(unit) == parseInt(oldsub))
      {
        return;
      }
      var sub = $("#row" + i).find(".cart-subtotal").html(oldsub - unit);
      var oldsubtotal = $("#subtotal").text();
      var newsubtotal = $("#subtotal").html(oldsubtotal - unit);

      var success = function (data) {
        loadcart();

      };

      var data = {
        id: id,
        qty: qty,
      };

      ajaxcall('/addToCart', data, 'post', success);

  });
  $(document).on("click",".deleteProduct",function(e)
  {
    e.preventDefault();
    var id=$(this).data('id');
    var data={
      id:id,
    }
    var success=function (data)
    {
      location.reload();

    }
    ajaxcall("/removeItem",data,'post',success);
  });
  $(document).on("click",".slide-remove-btn",function(e)
  {
    e.preventDefault();
    var id=$(this).data('id');
    var data={
      id:id,
    }
    var success=function (data)
    {
      loadcart();
    }
    ajaxcall("/removeItem",data,'post',success);
  });
  // $(document).on("submit","#AddProductToCart",function(e){
  //   e.preventDefault();
  //
  //   var success=function (data)
  //   {
  //     showMessage("Product Has Been Added to Cart");
  //     loadcart();
  //   }
  //   var data=$(this).serializeArray();
  //   ajaxcall('/addToCart',data,'post',success)
  // });
  $(document).on("click", "#AddProductToCart .quantity-btn", function(e) {
    e.preventDefault();
    return false;
  });
  // $(document).on("change", "#pcolor, #psize", function(e) {
  //   e.preventDefault();
  //   return false;
  // });
  // $(document).on("click", "#pcolor, #psize", function(e) {
  //   e.preventDefault();
  //   return false;
  // });
  function loadcart()
  {
    var success=function (data)
    {

      $("#sideCart").html(data.output);
      $("#total").html(data.total);
      $("#totalprice").html(data.totalprice);
      $("#headercarttotal").html(data.total);
    };
    ajaxcall('/loadCart',null,'post',success)
  }
  @auth
  loadWishlist();
  @endauth
  function loadWishlist()
  {
    var success=function (data)
    {

      $("#listwish").html(data.output);
      $("#countwish").html(data.total);
      $("#wishcout2").html(data.total);
    };
    ajaxcall('/loadWishlist',null,'post',success)
  }
  function ajaxcall(url,data=null,method='post',success){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({

      url:url,
      method:method,
      data:data,
      dataType:'json',
      success:success,
      error : function (xhr, status, error) {
        console.error(error);
      },
    });
  }
  loadcart();
  function ChangeImage(newImageUrl) {
    var imageElement = document.getElementById('image-change');
    imageElement.src = newImageUrl;
  }
  function showMessage(message)
  {
    Swal.fire({
      icon: "success",
      title:message,
      showConfirmButton: false,
      timer: 1000
    });
  }
</script>
