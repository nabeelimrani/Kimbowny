/*
 * Template Name : Pet shop Ecommerce HTML Template
 * Version : 1.0.0
 * Created by : Pet shop Ecommerce HTML Template
 * File: Custom JS 
 */

/*
====================================
[ JS TABLE CONTENT ]
------------------------------------
    1.0 - header Sticky js
    2.0 - Color Switcher js
    3.0 - Slider js
    4.0 - Header js
    5.0 - Contact Js
    6.0 - Color Switch Js
    7.0 - Testimonials Js
    8.0 - Related Product Js
    9.0 - FAQ Js
    10.0 - QTY Js
    11.0 - Preloader Js
    12.0 - Scroll Up Js
-------------------------------------
[ END JS TABLE CONTENT ]
=====================================
*/
/* =============================================
                Theme Reset jQuery
============================================= */
/* header Sticky js */
$(window).scroll(function () {
  if ($(window).scrollTop() >= 300) {
    $('.header-bottom').addClass('fixed-header');
  } else {
    $('.header-bottom').removeClass('fixed-header');
  }
});
/* header Sticky js */
/* Color Switcher js */
window.onload = function () {
  var themeClr = $.cookie('theme-color');
  if (themeClr !== undefined && themeClr != '') {
    $('body').removeClass(themeClr);
  }
  $('body').removeClass('theme-defalt');
  $('body').addClass(themeClr);

  document.addEventListener("contextmenu", function (e) {
    e.preventDefault();
  }, false);
  document.addEventListener("keydown", function (e) {
    //document.onkeydown = function(e) {
    // "I" key
    if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
      disabledEvent(e);
    }
    // "J" key
    if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
      disabledEvent(e);
    }
    // "S" key + macOS
    if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
      disabledEvent(e);
    }
    // "U" key
    if (e.ctrlKey && e.keyCode == 85) {
      disabledEvent(e);
    }
    // "F12" key
    if (event.keyCode == 123) {
      disabledEvent(e);
    }
  }, false);

  function disabledEvent(e) {
    if (e.stopPropagation) {
      e.stopPropagation();
    } else if (window.event) {
      window.event.cancelBubble = true;
    }
    e.preventDefault();
    return false;
  }
};
/* Color Switcher js */
$(document).ready(function () {
  $('.list-unstyled li').click(function () {
    var c = $.cookie('theme-color');
    if (c !== undefined && c != '') {
      $('body').removeClass(c);
    }
    $('body').removeClass('theme-defalt');
    var clr = $(this).attr('class');
    $('body').addClass(clr);
    $.cookie('theme-color', clr);
  });
  /* Slider js */
  $(".slider-area").owlCarousel({
    autoplay: false,
    lazyLoad: true,
    loop: true,
    margin: 20,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: true,
    responsive: {
      0: {
        items: 1
      },

      600: {
        items: 1
      },

      1024: {
        items: 1
      },

      1366: {
        items: 1
      }
    }
  });
  $(".owl-prev").html('<span class="sl-arrow-left"></span>');
  $(".owl-next").html('<span class="sl-arrow-right"></span>');
  /* Slider js */
  /* Header js */
  $(".header-search").click(function () {
    $(".search-dropdown").toggleClass("search-active");
  });
  $(".theme-dropdown-menu").click(function () {
    $(".nav-link").toggleClass("dropdown-active");
  });
  $(".header-cart").click(function () {
    $("body").addClass("slide-active");
  });
  $(".slide-close").click(function () {
    $("body").removeClass("slide-active");
  });
  $(".header-wishlist").click(function () {
    $("body").addClass("wishlist-active");
  });
  $(".slide-close").click(function () {
    $("body").removeClass("wishlist-active");
  });
  $(".switch-button").click(function () {
    $(".switched-styles").addClass("show");
    $(".switch-button").addClass("hide");
  });
  /* Header js */
  /* Contact Js */
  $(".theme-submit").click(function () {
    let allAreFilled = true;
    document.getElementById("send-mail").querySelectorAll("[required]").forEach(function (i) {
      if (!allAreFilled) return;
      if (!i.value) allAreFilled = false;
      if (i.type === "radio") {
        let radioValueCheck = false;
        document.getElementById("myForm").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
          if (r.checked) radioValueCheck = true;
        })
        allAreFilled = radioValueCheck;
      }
    })
    if (!allAreFilled) {
      $(".theme-error-message").html("This field is requires");
      $(".theme-error-message").addClass("active");
      setTimeout(function () {
        $(".theme-error-message").removeClass("active");
      }, 5000);
    } else {

      $(".theme-error-message").html('Message sent successfully');
      $(".theme-error-message").addClass("active");
      $(".theme-error-message").addClass("message-sucsess");
      setTimeout(function () {
        $(".theme-error-message").removeClass("active");
        $(".theme-error-message").removeClass("message-sucsess");
      }, 3000);
    }
  });
  /* Contact Js */
  /* Color Switch Js */
  $(".hide-button").click(function () {
    $(".switched-styles").removeClass("show");
    $(".switch-button").removeClass("hide");
  });
  /* Color Switch Js */
  $('#exampleModal').modal({
    show: true
  });
  /* Testimonials Js */
  $(".testimonail-slider").owlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 20,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: true,
    responsive: {
      0: {
        items: 1
      },

      600: {
        items: 1
      },

      1024: {
        items: 2
      },

      1366: {
        items: 3
      }
    }
  });
  /* Testimonials Js */
  /* Related Product Js */
  $(".related-product-slider").owlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 15,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: true,
    responsive: {
      0: {
        items: 1
      },

      600: {
        items: 2
      },

      1024: {
        items: 3
      },

      1366: {
        items: 4
      }
    }
  });
  /* Related Product Js */
  /* FAQ Js */
  $(".faq-box-list > a").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".content")
        .slideUp(200);
    } else {
      $(".faq-box-list > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this)
        .siblings(".content")
        .slideDown(200);
    }
  });
  /* FAQ Js */
});
/* QTY Js */
(function () {
  "use strict";
  var jQueryPlugin = (window.jQueryPlugin = function (ident, func) {
    return function (arg) {
      if (this.length > 1) {
        this.each(function () {
          var $this = $(this);

          if (!$this.data(ident)) {
            $this.data(ident, func($this, arg));
          }
        });

        return this;
      } else if (this.length === 1) {
        if (!this.data(ident)) {
          this.data(ident, func(this, arg));
        }

        return this.data(ident);
      }
    };
  });
})();
/* QTY Js */
(function () {
  "use strict";

  function Guantity($root) {
    const element = $root;
    const quantity = $root.first("data-quantity");
    const quantity_target = $root.find("[data-quantity-target]");
    const quantity_minus = $root.find("[data-quantity-minus]");
    const quantity_plus = $root.find("[data-quantity-plus]");
    var quantity_ = quantity_target.val();
    $(quantity_minus).click(function () {
      quantity_target.val(--quantity_);
    });
    $(quantity_plus).click(function () {
      quantity_target.val(++quantity_);
    });
  }
  $.fn.Guantity = jQueryPlugin("Guantity", Guantity);
  $("[data-quantity]").Guantity();
})();
/* Preloader Js */
$(window).on('load', function () { // makes sure the whole site is loaded 
  // $('.theme-preloader').fadeOut(); // will first fade out the loading animation 
  $('.theme-preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({
    'overflow': 'visible'
  });
})
/* Preloader Js */
const toggleForm = () => {
  const container = document.querySelector('.container');
  container.classList.toggle('active');
};
/* Scroll Up Js */
var btn = $('#page-up');

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: 0
  }, '300');
});
/* Scroll Up Js */
new WOW().init();