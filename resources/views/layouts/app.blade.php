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
</html>
<script>
  $(document).on("click","#addToCart",function(){
    var id=$(this).data("id");
    var success=function (data)
    {
     loadcart();
    }
    var data={
      id:id,
      qty:1,
    }
  ajaxcall('/addToCart',data,'post',success)
  });

  function loadcart()
  {
    var success=function ()
    {
      alert("cart loaded");
    };
    ajaxcall('/loadCart',null,'post',success)
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
  function ChangeImage(newImageUrl) {
    var imageElement = document.getElementById('image-change');
    imageElement.src = newImageUrl;
  }
</script>
