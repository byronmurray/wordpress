<?php get_header(); ?>

  <!-- hero image _get from page featured image -->
  <div class="page--header-image" style="background-image: url(http://dubzzprojects.co.nz/jpc/wp-content/uploads/2017/03/JPC-2017-02-15-Mass_1398.jpg);"></div>
  
  <div class="page-header">

    <div class="container"> 
      <h1>Search Results</h1>
    </div>

  </div>

  <div class="container">

    <div class="row">
      
      <div class="col-md-9">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

          <?php the_excerpt(); ?>

          <hr>

        <?php endwhile; else: ?>
          
          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content is appearing for this page!</p>

        <?php endif; ?>


      </div>

      <div class="col-md-3 sidebar">
      
        <?php get_sidebar(); ?>

      </div>

    </div>

  </div>

<?php get_footer(); ?>