import "./scss/main.scss";
import "expose-loader?exposes=jQuery,$!jquery";
import "./js/util/jQueryPlugins";
import "@fancyapps/fancybox/dist/jquery.fancybox";
import "slick-carousel/slick/slick.min.js";
import {dirSite} from "./js/helpers/constants";
import StandartForm from "./js/blocks/forms/StandartForm";
import DownloadCatalogForm from "./js/blocks/forms/DownloadCatalogForm";
import DownloadCatalogPopup from "./js/blocks/popups/DownloadCatalogPopup";
import FormPopup from "./js/blocks/popups/FormPopup";
import Modal from "./js/Modal";
import TechnicsSelectPopup from "./js/blocks/popups/TechnicsSelectPopup";
import Cookie from "./js/util/Cookie";

//Embed forms handler
jQuery("*[data-embed-form]").arr().forEach(formElement => new StandartForm(formElement));

//Popups common handler
jQuery("*[data-popup-link]").arr().forEach(linkElement => {
  linkElement.click(async event => {
    event.preventDefault();

    const formItem = new FormPopup({
      link: linkElement.attr("href") ? linkElement.attr("href") : linkElement.attr("data-popup-link")
    });
    await formItem.open();
  });
});

//Technics select popup
jQuery("*[data-technics-select-link]").click(async event => {
  event.preventDefault();
  const technicsSelectPopup = new TechnicsSelectPopup();
  await technicsSelectPopup.open()
});

//Road map popup
jQuery("*[data-road-map-link]").click(async event => {
  event.preventDefault();
  const popup = new Modal({
    link: "/popup/road-map",
    modifications: ["map"]
  });
  await popup.open();
});

//Download catalog
jQuery("*[data-download-catalog-form]").arr().forEach(formElement => new DownloadCatalogForm(formElement));
jQuery("*[data-download-catalog-popup]").arr().forEach(linkElement => {
  linkElement.click(async event => {
    event.preventDefault();

    const formItem = new DownloadCatalogPopup({
      link: linkElement.attr("href") ? linkElement.attr("href") : linkElement.attr("data-popup-link")
    });
    await formItem.open();
  });
});

//Auto download catalog popup
if (!Cookie.get("download-catalog-showed")) {
  setTimeout(() => {
    const formItem = new DownloadCatalogPopup({
      link: "/popup/download-catalog"
    });
    formItem.open().then(() => {
      Cookie.set("download-catalog-showed", true, 365);
    });
  }, 40000);
}

//Technics select alert
if (Cookie.get("download-catalog-showed") && !Cookie.get("quiz-alert-showed")) {
  const technicsSelectAlert = jQuery(".ml-test");
  const technicsSelectAlertClose = technicsSelectAlert.find(".close");

  jQuery("#technics-select-alert-button").click(async event => {
    event.preventDefault();
    technicsSelectAlert.fadeOut();
    const technicsSelectPopup = new TechnicsSelectPopup();
    await technicsSelectPopup.open();
  });

  technicsSelectAlertClose.click(event => {
    event.preventDefault();
    technicsSelectAlert.fadeOut();
  });

  setTimeout(() => {
    technicsSelectAlert.fadeIn();
    Cookie.set("quiz-alert-showed", true, 365);
  }, 20000);
}

if (window.location.pathname === "/rassrochka/") {
  import("./js/blocks/pages/credit").then(({default: creditPageScript}) => {
    new creditPageScript();
  });
}

/* -------- */

var offsetTop = $(window).height() * 2;
$(window).scroll(function (event) {
  if ($(document).scrollTop() > offsetTop) {
    $('.to_top').addClass('act');
  } else {
    $('.to_top').removeClass('act');
  }
});
$(".to_top").on("click", function (event) {
  var top = 0;
  $('body,html').animate({scrollTop: top}, 1000);
});

$('.close, .back-close').not('.not-close').on('click', function (event) {
  event.preventDefault();
  if ($(this).hasClass('close-nav')) {
    $(".nav__wrap").removeClass('active');
    $('.nav-overlay').fadeOut();
    $('.main').css('z-index', '20');
  }
  $('.card-js').removeClass('zi0');
  $('.arrows').removeClass('zi0');
  if ($(this).hasClass('cln')) {
    $('.mn-right-it-1').show();
    $('.mn-right-it-2').hide();
    $('.mn-right-it-3').hide();
  }

  $(".overlay").fadeOut();
  $("html").removeClass('stop');
});

$('.burger__wrap').on('click', function (event) {
  event.preventDefault();
  $('.nav__wrap').addClass('active');
  $('.nav-overlay').fadeIn();
  $('.zi1').css('z-index', '0');
  $('.main').css('z-index', '600');
});

$('.overlay').not('.overlay-page').mouseup(function (e) {
  var container = $('.modal-wrap');
  if (container.has(e.target).length === 0 && !container.is(e.target)) {
    $('html').removeClass('stop');
    $('.overlay').fadeOut();
    $('.mn-right-it-1').show();
    $('.mn-right-it-2').hide();
    $('.mn-right-it-3').hide();
  }
});

$('.btn-good-js').on('click', function (event) {
  event.preventDefault();
  var msg = '';
  var action = $(this).attr('href');

  $.ajax({
    type: "GET", url: action, data: msg, success: function (data) {
      $('#modal-good-cont').html(data);
    },
  });
  $('html').addClass('stop');
  $('#modal-good').fadeIn();
});


$('.btn-info-js').on('click', function (event) {
  event.preventDefault();
  var msg = '';
  var action = $(this).attr('href');

  $.ajax({
    type: "GET", url: action, data: msg, success: function (data) {
      $('#modal-info-cont').html(data);
    },
  });
  $('html').addClass('stop');
  $('#modal-info').fadeIn();
});

$('.feedback-slider__more').on('click', function (event) {
  event.preventDefault();
  if (!$(this).hasClass('cl')) {
    $(this).siblings('.feedback-slider__text').find('.feedback-slider__dots').hide();
    $(this).siblings('.feedback-slider__text').find('.feedback-slider__hover').fadeIn();
    $(this).find('div').text('Скрыть');
    $(this).addClass('cl');
  } else {
    $(this).siblings('.feedback-slider__text').find('.feedback-slider__dots').fadeIn();
    $(this).siblings('.feedback-slider__text').find('.feedback-slider__hover').hide();
    $(this).find('div').text('Еще');
    $(this).removeClass('cl');
  }
});

function prcBtn() {
  $('.price-btn').on('click', function (event) {
    event.preventDefault();
    var title = $(this).parents('.price-item').find('.title-prm').text().trim();
    $('.titles-cbp1').text(title);
    $('.titles-cbp').val(title);
    // $('#dok-inp').val($(this).parents('.specials__text').find('.title-name').text().trim());
    $('html').addClass('stop');
    $('#modal-cbp').fadeIn();
  });
}

prcBtn();

$('.order-u').on('click', function (event) {
  event.preventDefault();
  var title = $(this).parents('.d-pr__right-item').find('.title-imd').text().trim();
  $('.titles-cbp1').text(title);
  $('.titles-cbp').val(title);
  // $('#dok-inp').val($(this).parents('.specials__text').find('.title-name').text().trim());
  $('html').addClass('stop');
  $('#modal-cbp').fadeIn();
});

const d = new Date();
const monthA = 'января,февраля,марта, апреля, мая, июня, июля, августа, сентября, октября, ноября, декабря'.split(',');
d.setMonth(d.getMonth() + 1);
d.setDate(d.getDate() - 7);
$('.date-js').text(d.getDate() + '.' + d.getMonth() + '.' + d.getFullYear());

$('.btn-port-bl').on('click', function (event) {
  event.preventDefault();
  $(this).toggleClass('show');
  if ($(this).hasClass('show')) {
    $(this).find('b').text('Скрыть');
    $('.portfolio__item').fadeIn();

    $('.portfolio__slider-top').slick('setPosition');
    $('.portfolio__slider-bot').slick('setPosition');

  } else {
    $(this).find('b').text('Показать еще');

    $('.portfolio__item').each(function (index, el) {

      if (index < 5) {
        $(this).fadeIn();
      } else {
        $(this).hide();
      }
    });
    $('.portfolio__slider-top').slick('setPosition');
    $('.portfolio__slider-bot').slick('setPosition');
    var id = $(this).attr('href'), top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 600);
  }
});

$(".nav a, .footer-nav a").on("click", async function (event) {
  const link = jQuery(this);
  const href = link.attr("href");

  if (href[0] === "#") {
    event.preventDefault();
    if (href === "#not") return false;

    if (link.parents(".nav__wrap").hasClass("active") && jQuery(window).width() < 900) jQuery(".nav__wrap").removeClass("active");

    const targetElement = jQuery(href);
    jQuery("body, html").animate({
      scrollTop: targetElement.offset().top,
    }, 1000);

    return  false;
  }

  if (href === "/popup/optovikam") {
    event.preventDefault();

    const formItem = new FormPopup({
      link: "/popup/optovikam"
    });
    await formItem.open();
  }
});


$(".btn-nav-calc").on("click", function (event) {

  $(".nav__wrap").removeClass("active");
  $('html').removeClass('stop');

  var id = $('#test-c').offset().top;
  $('body,html').animate({scrollTop: id}, 1000);

});


$('.link-scroll').on('click', function (event) {
  event.preventDefault();
  var id = $(this).attr('href'), top = $(id).offset().top;
  $('body,html').animate({scrollTop: top}, 1000);
});

if ($(window).width() < 567) {
  // $(".pcsdfp").clone().removeClass('desc-v')
  // .appendTo(".mobprs-item");
  // $('.desc-v').remove();


  $(".sertificat-analysis").clone().removeClass('desc-v')
    .appendTo(".sals");
  $('.desc-v').remove();
}

$(".btn-prices-js-a").on("click", function (event) {
  event.preventDefault();
  var id = $('#pforms').offset().top;
  $('body,html').animate({scrollTop: id}, 400);

});

$(".title, .title-lg").not('.title-first').each(anime);
$(".t-min, .t-ss, .tab__cont__info__item").not('.title-first').each(anime);

// $(".title-descr").not('.subtitle-first').each(anime);
function anime(anim) {
  var thisTitle = $(this);
  var offsetTop = thisTitle.offset().top - $(window).height() - 10;
  if ($(document).scrollTop() > offsetTop) {
    thisTitle.addClass('fade_in');
  }
  $(window).scroll(function (event) {
    offsetTop = thisTitle.offset().top - $(window).height() - 10;
    if ($(document).scrollTop() > offsetTop) {
      thisTitle.addClass('fade_in');
    }
  });
}

if ($('body').find('.project__items').length > 0) {
  $('.project__tab-item').on('click', function (event) {
    event.preventDefault();
    if (!$(this).hasClass('active')) {
      $('.project__tab-item').removeClass('active');
      $(this).addClass('active');
      $('.project__items').hide().eq($(this).index()).fadeIn();
    }
  });
}

$('.dir-sh').on('click', function (event) {
  event.preventDefault();

  if ($(this).hasClass('open')) {

    $(this).parents('.dir__advas-item-text').find('.text-dir-wrap').addClass('act');
    $(this).removeClass('open');
  } else {
    $(this).addClass('open');

    var heigtText = $(this).parents('.dir__advas-item-text').find('.text-dir').outerHeight();

    $(this).parents('.dir__advas-item-text').find('.text-dir-wrap').removeClass('act').removeAttr('style').css({
      height: heigtText,
    });


  }

});

$(".flst1 a").on("click", function (event) {
  var id = $(this).attr('href'), top = $(id).offset().top;
  $('body,html').animate({scrollTop: top}, 600);
});

$(".to_catalog").on("click", function (event) {
  event.preventDefault();
  var id = $('.tab').offset().top - 20;
  $('body,html').animate({scrollTop: id}, 600);
});

$('.date-next').on('click', function (event) {
  event.preventDefault();

  if ($(this).parents('.mn__form-block').find('.input').val() !== '') {
    $('.mn-right-it-1').hide();
    $('.mn-right-it-2').fadeIn();
  } else {
    $(this).parents('.mn__form-block').find('.input').focus();
  }

});

$('.price__tab-item').on('click', function (event) {
  event.preventDefault();
  if (!$(this).hasClass('active')) {
    $('.price__tab-item').removeClass('active');
    $(this).addClass('active');

    $('.price__item').hide().eq($(this).index()).fadeIn();
    $('.price__img-item').hide().eq($(this).index()).fadeIn();

    var id = $('.price__tab').offset().top - 20;
    $('body,html').animate({scrollTop: id}, 600);

    $('.etap-js').hide().eq($(this).index()).fadeIn();
    $('.etap__slider').slick('setPosition');
  }
});


$('.faq__acr').on('click', function (event) {
  event.preventDefault();
  $(this).toggleClass('active');
  $(this).find('.faq__acr-body').slideToggle();
});

$('.objects-block__item').each(function (index, el) {
  $(this).find('.objects-nav__img , .objects-block__img').attr('data-fancybox', 'p-' + index);
  if (index > 1) {
    $(this).hide();
  }
});


$('.price__more').on('click', function (event) {
  event.preventDefault();
  if (!$(this).hasClass('show')) {
    $('.price__item').fadeIn();
    $(this).addClass('show').find('b').text('Скрыть');

  } else {
    $(this).removeClass('show').find('b').text('смотреть больше услуг');
    ;$('.price__item').each(function (index, el) {
      if (index > 7) {
        $(this).hide();
      }
    });
  }
});

$('.info__add').on('click', function (event) {
  event.preventDefault();
  if (!$(this).hasClass('cl')) {
    $(this).siblings().find('.info__dop-text').fadeIn();
    $(this).find('.info__add-text').text('Скрыть');
    $(this).addClass('cl');
  } else {
    $(this).siblings().find('.info__dop-text').hide();
    $(this).find('.info__add-text').text('Показать еще');
    $(this).removeClass('cl');
  }
});

$(".gtab__tab-item").on("click", function () {
  if ($(window).width() < 767) {
    var elem = $('.garant__right');
    var top = elem.offset().top - 15;
    $('body,html').animate({scrollTop: top}, 400);
  }
});


$(".gtab__top").on("click", function () {

  if ($(this).hasClass('active')) {
    $(".gtab__top").removeClass('show');
    $(".gtab__top").siblings('.gtab__hover').hide();
    $(".gtab__top").removeClass('active');
  } else {

    $(".gtab__top").removeClass('show');
    $(".gtab__top").removeClass('active');
    $(".gtab__top").siblings('.gtab__hover').hide();
    var $this = $(this);
    setTimeout(function () {
      $this.addClass('show');
      $this.addClass('active');
    }, 100);

    $(this).siblings('.gtab__hover').fadeIn();
  }
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

$('#vid-slider1').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  fade: false,
  dots: true,
  nextArrow: '<button class="arrows t2 slideNext"><img src="' + dirSite + 'assets/img/icons/next-arrow1.svg" alt=""></button>',
  prevArrow: '<button class="arrows t2 slidePrev"><img src="' + dirSite + 'assets/img/icons/prev-arrow1.svg" alt=""></button>',
  responsive: [{
    breakpoint: 900, settings: {
      slidesToShow: 3, autoplay: false,
    }
  }, {
    breakpoint: 767, settings: {
      slidesToShow: 1, autoplay: false,
    }
  }, {
    breakpoint: 567, settings: {
      slidesToShow: 1, autoplay: false,
    }
  },

  ]
});

$('#vid-slider2').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: false,
  dots: true,
  nextArrow: '<button class="arrows t2 slideNext"><img src="' + dirSite + 'assets/img/icons/next-arrow1.svg" alt=""></button>',
  prevArrow: '<button class="arrows t2 slidePrev"><img src="' + dirSite + 'assets/img/icons/prev-arrow1.svg" alt=""></button>',
  responsive: [{
    breakpoint: 900, settings: {
      slidesToShow: 1, autoplay: false,
    }
  }, {
    breakpoint: 767, settings: {
      slidesToShow: 1, autoplay: false,
    }
  }, {
    breakpoint: 567, settings: {
      slidesToShow: 1, autoplay: false,
    }
  },

  ]
});

$('.gtab__tab-item').on('click', function (event) {
  event.preventDefault();
  if (!$(this).hasClass('current-menu-item')) {
    $('.gtab__tab-item').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
    $('.gtab__tab-cont').hide().eq($(this).index()).fadeIn();
  }
});

$('.serv__btn').hover(function (event) {
  event.preventDefault();
  $(this).parents('.serv__item').addClass('active');
}, function () {
  $(this).parents('.serv__item').removeClass('active');
});

$('.catalog__more').hover(function (event) {
  event.preventDefault();
  $(this).parents('.catalog__item').addClass('active');
}, function () {
  $(this).parents('.catalog__item').removeClass('active');
});

// $('.gtab__top').on('click', function (event) {
//   event.preventDefault();
//   if($(this).hasClass('show')){
//     $(this).removeClass('show');
//     $(this).siblings('.gtab__hover').hide();
//   } else{
//     $(this).addClass('show');
//     $(this).siblings('.gtab__hover').fadeIn();
//   }

// });

$('.it-right-slider').slick({

  slidesToShow: 3,
  slidesToScroll: 1,
  fade: false,
  dots: false,
  autoplay: true,
  autoplaySpeed: 2000,
  nextArrow: '<button class="arrows t3 slideNext"><img src="' + dirSite + 'assets/img/icons/next-arrow1.svg" alt=""></button>',
  prevArrow: '<button class="arrows t3 slidePrev"><img src="' + dirSite + 'assets/img/icons/prev-arrow1.svg" alt=""></button>',
  responsive: [{
    breakpoint: 900, settings: {
      slidesToShow: 2, autoplay: true,
    }
  }, {
    breakpoint: 767, settings: {
      slidesToShow: 2, autoplay: true,
    }
  }, {
    breakpoint: 567, settings: {
      slidesToShow: 1, autoplay: true,
    }
  },

  ]
});

$('.islit').hover(function () {
  //   var top = $(this).offset().top - $('.islit-hover').outerHeight();
  var left = $(this).offset().left + 20;
  var wt = $(this).outerWidth();
  $('.islit-hover').text($(this).data('text')).show();
  var top = $(this).offset().top - $('.islit-hover').outerHeight();
  $('.islit-hover').css({
    'top': top + 'px', 'left': left + 'px', 'width': wt + 'px'
  });
}, function () {
  $('.islit-hover').hide();
});

if ($('body').find('.seob__btn').length > 0) {
  $('.seob__btn').on('click', function (event) {
    event.preventDefault();

    if ($(this).hasClass('open')) {
      $(this).parents('.seob').find('.seob__text').addClass('act');
      $(this).removeClass('open');
      var elem = $('.seob');
      var top = elem.offset().top - 15;
      $('body,html').animate({scrollTop: top}, 400);
    } else {
      $(this).addClass('open');
      var heigtText = $(this).parents('.seob').find('.seob__text-wrap').outerHeight();

      $(this).parents('.seob').find('.seob__text').removeClass('act').removeAttr('style').css({
        height: heigtText,
      });


    }

  });
}


$('.nav-search-media .close').on('click', function (event) {
  event.preventDefault();
  $('.nav-search-media__hover').removeClass('active');
});
$(".nav-search__zoom-ico").on("click", function () {

  $(".nav-search-media__hover").addClass('active');

});

var header = $('.header__cont.v2'), scrollPrev = 0;

$(window).scroll(function () {
  var scrolled = $(window).scrollTop();

  if (scrolled > 400 && scrolled > scrollPrev) {
    header.addClass('out');
  } else {
    header.removeClass('out');
  }
  scrollPrev = scrolled;
});