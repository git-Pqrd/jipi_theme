<div class="front-gallery">
    <div class="container">
        <div class="card-columns">

      <?php
          $args = array( 'post_type' => 'oeuvre', 'posts_per_page' => 10 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
              $image = get_field('img_oeuvre');
              $thumb = $image['sizes'][ 'large' ];
              echo '<a href="'.get_permalink() .'" target="_blank" class="card"><img src="'. $thumb .'" alt="'. $image['alt'] .' "></a>';
          endwhile;
       ?>
        </div>
        <div class="gallery-shader">
            <a href="/galerie"><button class="gallery-shader-button">Voir la galerie</button></a>
        </div>

    </div>
</div>
