<?php

// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');

function indiana_setup() {
  // Register a new image size.
  add_image_size('experience-home-image', '250', '300', true);
  add_image_size('thumb500X400', '500', '400', true);
}
add_action('after_setup_theme', 'indiana_setup');

function indiana_body_class($classes) {
  if(!is_front_page()) {
    $classes[] = 'general-page';
  }
  
  return $classes;
}
add_filter( 'body_class', 'indiana_body_class' );

function indiana_image_sizes_choose($sizes) {
  $custom_sizes = array(
      'experience-home-image' => 'Experience Home Image'
  );
  return array_merge($sizes, $custom_sizes);
}

function indiana_custom_scripts() {
  // Include CSS
  wp_register_style('bootstrap-3', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('bootstrap-3');
  wp_register_style('jquery-ui-style', get_template_directory_uri() . '/jquery-ui-1.12.1/jquery-ui.min.css');
  wp_enqueue_style('jquery-ui-style');
  wp_register_style('jquery-ui-theme', get_template_directory_uri() . '/jquery-ui-1.12.1/jquery-ui.theme.min.css');
  wp_enqueue_style('jquery-ui-theme');  
  wp_register_style('jquery-ui-structure', get_template_directory_uri() . '/jquery-ui-1.12.1/jquery-ui.structure.min.css');
  wp_enqueue_style('jquery-ui-structure');
  wp_register_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
  wp_enqueue_style('font-awesome');
  wp_register_style('colorbox', get_template_directory_uri() . '/css/colorbox.css');
  wp_enqueue_style('colorbox');
  wp_register_style('indiana-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('indiana-style');
  // Include JS
  wp_register_script('jquery-1-12-4', get_template_directory_uri() . '/js/jquery1.12.4.min.js');
  wp_enqueue_script('jquery-1-12-4');
  wp_register_script('jquery-ui-js', get_template_directory_uri() . '/jquery-ui-1.12.1/jquery-ui.min.js');
  wp_enqueue_script('jquery-ui-js');  
  wp_register_script('iframeresizer-js', get_template_directory_uri() . '/js/iframeResizer.min.js');
  wp_enqueue_script('iframeresizer-js');  
  wp_register_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js');
  wp_enqueue_script('bootstrap.min');
  wp_register_script('jquery.colorbox-min', get_template_directory_uri() . '/js/jquery.colorbox-min.js');
  wp_enqueue_script('jquery.colorbox-min');
  wp_register_script('theme-js', get_template_directory_uri() . '/js/functions.js');
  wp_enqueue_script('theme-js');
}

add_action('wp_enqueue_scripts', 'indiana_custom_scripts');

function indiana_theme_menus() {
  register_nav_menus(
          array(
              'header-menu' => __('Header Menu'),
              'footer-menu' => __('Footer Menu')
          )
  );
}

add_action('init', 'indiana_theme_menus');

function mycustom_wp_footer() {
    
    echo "<script type=\"text/javascript\">
            document.addEventListener( 'wpcf7mailsent', function( event ) {
                if ( '131' == event.detail.contactFormId ) {
                    ga( 'send', 'event', 'Footer Contact Form', 'submit' );
                }
                if ( '377' == event.detail.contactFormId ) {
                    ga( 'send', 'event', 'Blog Subscription Form', 'submit' );
                }
                if ( '64' == event.detail.contactFormId ) {
                    ga( 'send', 'event', 'Home Contact Form', 'submit' );
                }
                document.location.href = 'http://www.indianatravelservices.com/thank-you';
            }, false );
         </script>\n";
    
}
add_action( 'wp_footer', 'mycustom_wp_footer' );
/*
 * Bootstrap Pagination
 */

