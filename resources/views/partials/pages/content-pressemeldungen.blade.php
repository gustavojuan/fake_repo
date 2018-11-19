<?php
$args = array(
  'orderby'        => 'date',
  'post_type'      => 'post',
  'posts_per_page' => '-1'
);
$the_query = new WP_Query( $args );
?>

<div class="carousel-inner" style="height: 500px">
  <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
  ?>
  <div class="carousel-item <?php if ( $the_query->current_post == 0 ) : ?>active<?php endif; ?>">
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="row">
      <div class="col-6"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_post_thumbnail( ); ?>
        </a></div>
      <div class="col-6">
        <?php the_content();?>
      </div>
    </div>
    <?php endif; ?>

    <div class="container">
      <div class="carousel-caption text-left">
        <h1><?php the_title(); ?></h1>
        <p class="d-none d-sm-block"><?php the_excerpt(); ?></p>
      </div>
    </div>
  </div><!-- /.carousel-item -->
  <!-- end second loop -->
  <?php endwhile;  endif; ?>
</div><!-- /.carousel-inner -->
</div><!-- /.carousel-slide -->
