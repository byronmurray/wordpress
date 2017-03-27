<?php
/*
  Template Name: Full Width Template
*/

?>

<?php get_header(); ?>

  <?php get_hero_image() ?>
  
  <div class="page-header">

    <div class="container"> 
      <h1><?php wp_title(''); ?></h1>
  </div>

  </div>

  <div class="container page-container">   
    <div class="row">
      
      <div class="col-md-12">
    
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>

          <?php endwhile; endif; ?>

      </div>


    </div>

  </div>

<?php get_footer(); ?>