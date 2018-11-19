<?php
$args = array(
  'orderby'        => 'date',
  'post_type'      => 'post',
  'posts_per_page' => '6'
);
$the_query = new WP_Query( $args );
$post_count = wp_count_posts()->publish;
?>
<div class="border_bot noticias_destacado">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php for($i = 0; $i <= $post_count; $i ++){?>
      <li data-target="#carouselExampleIndicators" data-slide-to=<?php $i ?> class="<?php if ( $i == 0 )
        echo 'active'?>"></li>
      <?php } ?>
    </ol>
    <div class="carousel-inner">
    <?php if ( $the_query->have_posts() ) : ?>

    <!-- pagination here -->

      <!-- the loop -->
      <?php  $counter = 0; ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class="carousel-item <?php if ( $counter == 0 ) {
        echo 'active';
      }?>">
        <div class="row">
          <div class="col-12 col-md-6">
            <img src="<?php  the_post_thumbnail_url() ?>" class="slide_img" alt="">
          </div>
          <div class="col-12 col-md-6">
            <h2><?= the_title()?></h2>
            <p><?php the_excerpt(7 )?></p>
            <a href="<?php get_post_permalink() ?>"><?php _e( "Mehr lesen", "sanlucar" )?></a>
          </div>
        </div>
        {{--  <img class="d-block w-100" src="http://placehold.it/1444x1000" alt="First slide">--}}
      </div>

      <?php  $counter = $counter + 1; ?>
      <?php endwhile; ?>
    <!-- end of the loop -->

      <!-- pagination here -->

      <?php wp_reset_postdata(); ?>

      <?php else : ?>
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<h3><?php _e( "SanLucar News", "sanlucar" );?></h3>

<div class="row">
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  <div class="col-12 col-md-4">
    <div>
      <img src="<?php  the_post_thumbnail_url() ?>" class="slide_img" alt="">
    </div>
    <h2><?php get_the_title()?></h2>
    <p class="border_bot"><?php echo get_the_excerpt(8)?></p>
    <p><?php the_date() ?></p>
  </div>

  <?php endwhile; ?>
<!-- end of the loop -->

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>
</div>

