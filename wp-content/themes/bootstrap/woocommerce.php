<?php get_header(); ?>

    <?php get_hero_image('shop') ?>
  
    <div class="page-header">
      <div class="container">
          <h1>Uniform Shop</h1>
      </div>
    </div>
  

    <div class="container">

    

    <div class="row">
      
      <div class="col-md-9">
		
          <?php woocommerce_content(); ?>

      </div>

      <div class="col-md-3 sidebar">
      
      	<?php get_sidebar('shop'); ?>

  	   </div>

    </div>

  </div>

<?php get_footer('shop'); ?>