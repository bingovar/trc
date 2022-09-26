// var lazyLoadInstance = new LazyLoad({
//          elements_selector: ".lazy"

//      });

var dirSite = $('#dir-site').val();
var dirSiteStart = $('#dir-site-start').val();
$(document).ready(function ($) {


});


$('#main-slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  fade: false,
  dots: true,
  autoplay: true,
  autoplaySpeed: 2000,
  nextArrow: '<button class="arrows t3 slideNext"><img src="' + dirSite + 'assets/img/icons/next-arrow1.svg" alt=""></button>',
  prevArrow: '<button class="arrows t3 slidePrev"><img src="' + dirSite + 'assets/img/icons/prev-arrow1.svg" alt=""></button>',
  responsive: [{
    breakpoint: 900, settings: {
      slidesToShow: 3, autoplay: false,
    }
  }, {
    breakpoint: 767, settings: {
      slidesToShow: 2, autoplay: false,
    }
  }, {
    breakpoint: 567, settings: {
      slidesToShow: 1, autoplay: false,
    }
  },
  
  ]
});

