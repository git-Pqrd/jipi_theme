<?php
/*
 *
 *  @package custom_ajaxtheme
 *
 *          ========================
 *                  AJAX FUNCTIONS
 *                      ========================
*/
add_action( 'wp_ajax_nopriv_load_more', 'load_more' );
add_action( 'wp_ajax_load_more', 'load_more' );

function load_more() {
    $paged = $_POST["page"];
    $args = array( 'post_type' => 'oeuvre', 'posts_per_page' => 5, 'paged' => $paged );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
              $image = get_field('img_oeuvre');
              $thumb = $image['sizes'][ 'large' ];
              $resp .= '<a href="'.get_permalink() .'" target="_blank" class="card"><img src="'. $thumb .'" alt="'. $image['alt'] .' "></a>';
          endwhile;

          echo $resp ;

        die();


}
