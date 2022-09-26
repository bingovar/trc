<?php
  
  add_action('wp_enqueue_scripts', 'HK_styles');
  function HK_styles() {
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/dist/css/main.bundle.css');
    
    wp_enqueue_style('my-theme-ie', get_stylesheet_directory_uri() . "/assets/css/ie.css", array('main-style'));
    wp_style_add_data('my-theme-ie', 'conditional', 'IE');
  }
  
  
  add_action('wp_enqueue_scripts', 'HK_scripts');
  function HK_scripts() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/dist/js/main.bundle.js', null, null, true);
    wp_enqueue_script('jquery');
  }
  
  add_action('after_setup_theme', 'theme_register_nav_menu');
  function theme_register_nav_menu() {
    register_nav_menu('top', 'Главное меню');
    register_nav_menu('top-2', 'Вторая навигация');
    register_nav_menu('top-mob', 'Для футера');
    register_nav_menu('cat-mob', 'Каталог');
    register_nav_menu('cat-mob2', 'Каталог');
    add_theme_support('post-thumbnails', array('post'));
  }
  
  function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  
  add_filter('upload_mimes', 'cc_mime_types');
  
  
  add_shortcode('st', 'st_func');
  function st_func($atts, $content) {
    $val = "<span> $content </span>";
    return $val;
  }
  
  
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
  
  
  add_action('wp_ajax_ajaxGet', 'ajaxGet');
  add_action('wp_ajax_nopriv_ajaxGet', 'ajaxGet');
  
  function ajaxGet() {
    include 'pagin.php';
    wp_die();
  }
  
  add_action('wp_ajax_formHandler', 'ajaxFormHandler');
  add_action('wp_ajax_nopriv_formHandler', 'ajaxFormHandler');
  function ajaxFormHandler() {
    include __DIR__ . '/assets/mailer/send.php';
    wp_die();
  }
  
  function searchfilter($query) {
    if ($query->is_search && !is_admin()) {
      $query->set('post_type', array('page'));
      $query->set('post__not_in', array(-2, -3, -40, -351, -353, -355, -170, -964, -966));
    }
    return $query;
  }
  
  add_filter('pre_get_posts', 'searchfilter');
  // удаляет H2 из шаблона пагинации
  add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
  function my_navigation_template($template, $class) {
    
    return '
    <nav class="navigation %1$s" role="navigation">
        <div class="nav-links">%3$s</div>
    </nav>    
    ';
  }
  
  // выводим пагинацию
  the_posts_pagination(array('end_size' => 2,));
  
  
  add_filter('excerpt_length', function () {
    return 50;
  });
  add_filter('excerpt_more', function ($more) {
    return ' ...';
  });
  
  
  function custom_rating_image_extension() {
    return 'png';
  }
  
  add_filter('wp_postratings_image_extension', 'custom_rating_image_extension');



