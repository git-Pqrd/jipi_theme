<?php get_header() ?>


<div id="product-page" class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4 product-page-titre"><?php the_field("nom_oeuvre"); ?></h1>
  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8 col-sm-12 product-page-images">



        <div class="product-image-lead-box">
                <?php $image = get_field('img_oeuvre'); if( !empty($image) ){ ?>
                <?php $thumb = $image['sizes'][ 'large' ]; ?>
                  <img class="img-fluid img-lead" id="current" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />

              <?php }; ?> <!--ends the if statement -->
        </div>

      <div class="product-page-thumbnails">
          <?php
          $images = get_field('galerie_oeuvre');
          $size = 'medium'; // (thumbnail, medium, large, full or custom size)

          if( $images ): ?>
                  <?php $image = get_field('img_oeuvre'); if( !empty($image) ){ ?>
                  <?php $thumb = $image['sizes'][ 'large' ]; ?>
                      <img class="img-fluid img-gal img-lead" id="current" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />

                  <?php }; ?> <!--ends the if statement -->
                  <?php foreach( $images as $image ): ?>
                        <?php echo wp_get_attachment_image( $image['ID'], $size ,"",[ "class" => "img-gal img-fluid" ]); ?>
                  <?php endforeach; ?>
          <?php endif; ?>
      </div>

    </div>


    <div class="col-md-4 product-page-column-description">
      <h3 class="my-3 product-page-sous-titre">Description</h3>
      <div class="product-page-short-description"> <?php the_field("short_description_oeuvre") ?> </div>
      <button class="product-page-button">Contactez moi</button>
    </div>

    </div>
      <div class="product-page-long-description" > <?php the_field("long_description_oeuvre") ?> </div>
</div>

<?php get_footer() ?>
