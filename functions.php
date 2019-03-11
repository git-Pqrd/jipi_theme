<?php
function my_theme_enqueue_styles() {
    $parent_style = 'wp-bootstrap-4'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}

function  animation_scripts() {
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/build/bundle.js', array( 'jquery' ), true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'animation_scripts' );

function create_post_type() {
    register_post_type( 'Oeuvre',
      array(
        'labels' => array(
          'name' => __( 'oeuvre' ),
          'singular_name' => __( 'Oeuvre' )
        ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' =>  'dashicons-art' ,
    )
  );
}
add_action( 'init', 'create_post_type' );

//flush_rewrite_rules( false );
