<div class="gallery-gallery container">
      <section class="jumbotron text-center">
        <div class="container">
        <h3 class="jumbotron-heading"><?php the_field('titre_galerie','option') ?></h3>
          <p class="lead text-muted"><?php the_field('sous_titre_galerie','option') ?></p>
          <p>
        </div>
        </section>
        <div class="card-columns galerie-ajax">
      <?php
          $args = array( 'post_type' => 'oeuvre', 'posts_per_page' => 5 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
              $image = get_field('img_oeuvre');
              $thumb = $image['sizes'][ 'large' ];
              echo '<a href="'.get_permalink() .'" target="_blank" class="card"><img src="'. $thumb .'" alt="'. $image['alt'] .' "></a>';
          endwhile;
       ?>
        </div>
        <div class="gallery-shader">
        <button class="gallery-shader-button" id="see-more" data-url="<?php echo admin_url('admin-ajax.php'); ?>">Voir Plus</button>
        </div>

</div>
