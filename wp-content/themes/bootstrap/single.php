<?php get_header(); ?>

  <?php get_hero_image('shop') ?>
  
  <div class="page-header">

  	<div class="container"> 
  		<h1>News</h1>
	</div>

  </div>

  <div class="container">   
    <div class="row">
      
      <div class="col-md-9 post-article">

          <?php if (get_the_post_thumbnail( ) ): ?>
            <?php the_post_thumbnail( ); ?>
            <div class="padding"></div>
          <?php endif ?>

          <h2><?php the_title(); ?></h2>
          	
          <?php the_content(); ?>

      </div>

      <div class="col-md-3 sidebar">
      
      	<?php get_sidebar('blog'); ?>

  	   </div>

    </div>

  </div>

<?php get_footer(); ?>