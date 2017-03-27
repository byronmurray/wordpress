<!-- Carousel

this may be better as a function then we can pass in the var for the args
================================================== -->
<section class="myCarousel-slider">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">

    <?php $loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => 10, 'order' => 'ASC' ) );
    $i = 0;
    
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php if ($i == 0): ?>

      <div class="item active">

    <?php else: ?>

      <div class="item">

    <?php endif; ?>
        <img class="first-slide" src="<?php the_post_thumbnail_url('full') ?>" >

        <div class="carousel-caption">

          <h1><?php the_title( ); ?></h1>
          <h2><?php the_content( ); ?></h2>

          <p>
            <a href="#" class="btn btn-primary">Main call to action</a>
            <a href="#" class="btn btn-secondary">Secondary action</a>
          </p>

        </div>
      </div> <!-- item -->

    <?php $i++; endwhile; ?>
    </div> <!-- carousel-inner -->
  </div><!-- /.carousel -->
</section>