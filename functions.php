<?php
function my_theme_enqueue_styles() {
    $parent_style = 'wp-bootstrap-4'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}

function  animation_scripts() {
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/build/bundle.js', array(), true);
}

//include this php to the ajax callable
//include('ajax-action.php');

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


include get_theme_file_path() . '/ajax-action.php';
//flush_rewrite_rules( false );
//
//
//

if( function_exists('acf_add_options_page') ) {


		acf_add_options_page(array(
			'page_title' 	=> 'Texte Site',
			'menu_title'	=> 'textes',
			'menu_slug' 	=> 'theme-general-settings',
            'icon_url'      => 'dashicons-media-document' ,
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

}

function remove_menus() {
    //remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'jetpack' );                    //Jetpack*
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
}
add_filter('acf/settings/show_admin', '__return_false');
add_action( 'admin_menu', 'remove_menus' );
