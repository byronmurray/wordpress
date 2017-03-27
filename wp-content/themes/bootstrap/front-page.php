<?php get_header(); ?>

<?php get_template_part( 'includes/home', 'slider' ); ?>



<div class="container text-center padding">

  <h2>Welcome to <span style="color: green">My website</span></h2>
  <p>Here at Nelson Bays Property Management, your investment is treated like it’s our own. Taking charge of full property management services to investors and property owners, partnership is guaranteed, maximising the return on investment through efficient performance. With combined extensive knowledge on local markets and customized marketing strategies, values are maximized and risks are minimised, thus promoting long-term sustainable tenancy</p>


</div><!-- Container-fluid end -->

<div class="container padding">

  <div class="row">
    
    <!-- call to actions -->
      <div class="col-md-4"><img src="http://www.a1methtesters.co.nz/uploads/8/7/0/7/87077692/meth-testers-waikato-2-revised.jpg?495" alt=""><h2>header</h2><p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p></div>
      <div class="col-md-4"><img src="http://www.a1methtesters.co.nz/uploads/8/7/0/7/87077692/meth-testers-waikato-2-revised.jpg?495" alt=""><h2>header</h2><p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p></div>
      <div class="col-md-4"><img src="http://www.a1methtesters.co.nz/uploads/8/7/0/7/87077692/meth-testers-waikato-2-revised.jpg?495" alt=""><h2>header</h2><p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p></div>

  </div><!-- .row -->


</div><!-- Container-fluid end -->


<div class="container text-center padding">
  
  <h2>Meet the <span style="color: green;">Team</span></h2>
  
  <div class="row">

  <?php $loop = new WP_Query( array( 'post_type' => 'staff', 'posts_per_page' => 10, 'order' => 'ASC' ) );
    $i = 0;
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="col-lg-3">
        <img class="rounded-circle" src="<?php the_post_thumbnail_url(); ?>" alt="Generic placeholder image" width="140" height="140">
        <p><b><?php the_title( ); ?></b></p>
        <p><?php the_content( ); ?></p>

      </div><!-- /.col-lg-4 -->


    <?php $i++; endwhile; ?>

    

    



  </div>

</div>

<!-- <div class="Container-fluid" style="background: url(http://wordpress.app/wp-content/uploads/2017/03/cool-wallpapers-earth_o6YC70d.jpg) no-repeat fixed;"> -->
<div class="container-fluid padding contact-container">

  <h2 class="text-center">Get in <span style="color: green;">Touch</span></h2>
  
  <div class="container text-center">
    <?php echo do_shortcode('[contact-form-7 id="9" title="Contact form 1"]') ?>
  </div>
  


</div><!-- Container-fluid end -->

<div class="container-fluid" style="background: #eee;">

  <div class="container padding">

    <h2 class="text-center">What our clients are <span style="color: green;">Saying</span></h2>
    
    

    <!-- Carousel
  ================================================== -->
  <section class="myCarousel-slider">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

      <?php $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 10, 'order' => 'ASC' ) );
      $i = 0;
      while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <?php if ($i == 0): ?>
        <div class="item active">
      <?php else: ?>
        <div class="item">
      <?php endif; ?>
          <blockquote class="blockquote">
        <p class="mb-0"><?php the_content(); ?></p>
        <p class="pull-right"><small><?php the_title() ?></small></p>
      </blockquote>
        </div> <!-- item -->

      <?php $i++; endwhile; ?>
      </div> <!-- carousel-inner -->
    </div><!-- /.carousel -->
  </section>

  </div>

  


</div><!-- Container-fluid end -->

<?php get_footer(); ?>