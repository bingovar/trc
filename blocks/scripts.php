<?php wp_footer(); ?>

<script>
  jQuery('.fancy-class, .play').fancybox({
    buttons: ['slideShow', 'zoom', 'fullScreen', 'close'],
    animationEffect: "zoom-in-out",
    animationDuration: 600,
    transitionEffect: "circular",
    transitionDuration: 420,
    
  });
  
  if (jQuery(window).width() < 767) {
    jQuery('#ubermenu-nav-main-6-top').append(jQuery('#menu-menju-2'));
    jQuery('#menu-menju-2 a').css({'color': '#000!important'});
  }
</script>


<script>
  jQuery('.ksp').on('click', function (event) {
    jQuery('#know-slider').slick('slickPrev');
  });
  jQuery('.ksn').on('click', function (event) {
    jQuery('#know-slider').slick('slickNext');
  });
</script>

<script>
  jQuery('.b-tab__item').on('click', function (event) {
    event.preventDefault();
    if (!jQuery(this).hasClass('current-menu-item')) {
      jQuery('.b-tab__item').removeClass('current-menu-item');
      jQuery(this).addClass('current-menu-item');
      jQuery('.b-tab__cont').hide().eq(jQuery(this).index()).fadeIn();
    }
  });
  
  jQuery('.impw-card').on('click', function (event) {
    event.preventDefault();
    if (!jQuery(this).hasClass('act')) {
      jQuery('.impw-card').removeClass('act');
      jQuery('.b-tab__item').removeClass('current-menu-item');
      jQuery('.b-tab__item').eq(jQuery(this).index()).addClass('current-menu-item');
      jQuery(this).addClass('act');
      jQuery('.b-tab__cont').hide().eq(jQuery(this).index()).fadeIn();
    }
  });
</script>