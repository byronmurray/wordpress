<?php get_header(); ?>

  <div class="page-header">
  

    <div class="container"> 
      <h1><?php the_title(); ?></h1>
    </div>

  </div>

  <div class="container">   
    <div class="row">
      
      <div class="col-md-9">

        
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <article class="post">
            
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><em>
              By <?php the_author(); ?> 
              on <?php echo the_time('l, F jS, Y');?>
              in <?php the_category( ', ' ); ?>.
            </em></p>            

            <?php the_excerpt(); ?>

            <hr>

          </article>

         
        <?php endwhile; else: ?>
          
          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content is appearing for this page!</p>

        <?php endif; ?>


      </div>

      <div class="col-md-3">
        <?php get_sidebar( 'blog' ); ?>
      </div>
      
      

    </div>
  </div>

<?php get_footer(); ?>