<div class="row" id="front-page">
    <div class="col-12 col-md-6 position-relative overlay-wrapper pl-0 pr-0" id="dafur">
        <div class="overlay-bg" style="background-image: url(<?=  get_template_directory_uri() . '/../dist/images/front-page/hall.jpg';  ?>)"></div>
        <div class="overlay position-absolute">
            <h2><?=_e( "Dafür stehen wir" )?></h2>
            <h3><?= _e(">> Der Welt natürliche Lebensfreude und Gesundheit zu bringen <<")?></h3>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="row h-50" style="overflow: hidden;">
            <div class="col-12 position-relative overlay-wrapper pl-0 pr-0">
                <div class="overlay-bg" style="background-image: url(<?=  get_template_directory_uri() . '/../dist/images/front-page/family.jpg';  ?>)"></div>
                <div class="overlay position-absolute">
                    <h2><?=_e( "d.r.e.a.m.s." )?></h2>
                    <h3><?=_e(">> Geschmack im Einklang mit Mensch und Natur <<")?></h3>
                </div>
            </div>
        </div>
        <div class="row  h-50" style="overflow: hidden;">
            <div class="col-12 col-md-6  position-relative overlay-wrapper pl-0 pr-0">
                <div class="overlay-bg" style="background-image: url(<?=  get_template_directory_uri() . '/../dist/images/front-page/vault.jpg';  ?>)"></div>

                <div class="overlay position-absolute">
                    <h2><?=_e( "Unser Sortiment" )?></h2>
                    <h3><?=_e(">> 365 Tage Obst und Gemüse <<")?></h3>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative overlay-wrapper pl-0 pr-0">
	            <?php
                    $args = array(
                        'orderby'        => 'date',
                        'post_type'      => 'post',
                        'posts_per_page' => '-1'
                    );
                    $the_query = new WP_Query( $args );
	            ?>
                    <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
                        <div class="carousel-inner h-100">

                        <?php if ( $the_query->have_posts() ) : ?>

                        <!-- pagination here -->
                            <?php  $counter = 0; ?>
                            <!-- the loop -->
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="h-100 carousel-item <?php if($counter==0){echo "active";}?>">
                                    <div class="overlay-bg" style="background-image: url(<?php  the_post_thumbnail_url() ?>)"></div>
                                    <div class="overlay position-absolute">
                                        <h2><?php echo mb_strimwidth(get_the_title(), 0, 25, '...'); ?></h2>

                                    </div>
                                </div>
	                            <?php  $counter++; ?>
                                <?php endwhile; ?>
                            <!-- end of the loop -->

                            <!-- pagination here -->

	                        <?php wp_reset_postdata(); ?>

	                        <?php else : ?>
                            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	                        <?php endif; ?>

                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>