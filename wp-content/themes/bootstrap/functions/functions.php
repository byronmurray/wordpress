<?php

function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

function get_hero_image($page = "") {
   if (get_the_post_thumbnail() && $page != "shop") {
    echo '<div class="page--header-image" style="background-image: url(';
    the_post_thumbnail_url('full');
    echo ');" ></div>';
  } else {
    echo '<div class="page--header-image" style="background-image: url(';
    echo get_template_directory_uri() . '/images/hero/hero-' . rand(1,6) .'.jpg);"></div>';
  }
}


function featured_posts ($offset) {

	$the_query = new WP_Query( [

		'post_type' 		=> 'post', 
		'posts_per_page' 	=> 1,
		'category_name'		=> 'Featured',
		'offset'           	=> $offset,


	] );

	if ( $the_query->have_posts() ) {

		while ( $the_query->have_posts() ) {

			$the_query->the_post();
		
			echo '<h3><a href="' . get_the_permalink() .'">' . get_the_title() . '</a></h3>';
			echo '<p><em>' . get_the_time('l, F jS, Y');
			echo ' in '; 
			the_category( ', ' );
			echo '</em></p>';           

			echo get_excerpt(300); 

			echo '<p><a class="btn btn-sm btn-danger" href="' . get_the_permalink() .'" role="button">Read More</a></p>';

		}
	}

}


function featured_gallery ($offset, $num_posts, $orderby = '') {

	$custom_query = new WP_Query( array( 'post_type' => 'gallery', 'offset' => $offset, 'posts_per_page' => $num_posts, 'orderby' => $orderby, 'order' => 'ASC' ) ); 

    if ($custom_query->have_posts() ) {
    	while($custom_query->have_posts() ) {

    		$custom_query->the_post();

            echo '<figure>';
            echo '<a class="featured-gallery" href="'; 
            echo get_the_permalink();
            echo '">';
            the_post_thumbnail(); 
            echo '<figcaption>';
            the_title();
            echo ' <img src="';
            bloginfo( 'url' );
            echo '/wp-content/uploads/2017/03/background-1.png" alt=""></figcaption>';
            echo '</figure>';
            echo '</a>';
             
    	}
	}
}





?>