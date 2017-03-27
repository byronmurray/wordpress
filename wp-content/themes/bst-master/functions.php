<?php
/*
All the functions are in the PHP pages in the functions/ folder.
*/

require_once locate_template('/functions/cleanup.php');
require_once locate_template('/functions/setup.php');
require_once locate_template('/functions/enqueues.php');
require_once locate_template('/functions/navbar.php');
require_once locate_template('/functions/widgets.php');
require_once locate_template('/functions/search.php');
require_once locate_template('/functions/feedback.php');

add_action('after_setup_theme', 'true_load_theme_textdomain');

function true_load_theme_textdomain(){
    load_theme_textdomain( 'bst', get_template_directory() . '/languages' );
}





function slider_cpt() {
    $args = array(
        'label'  => 'Sliders',
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'taxonomies' => array('slider', 'category' ),
    );

    register_post_type( 'slider', $args );
}

add_action( 'init', 'slider_cpt' );


function testimonials_cpt() {
    $args = array(
        'label'  => 'Testimonials',
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'taxonomies' => array('testimonials', 'category' ),
    );

    register_post_type( 'testimonials', $args );
}

add_action( 'init', 'testimonials_cpt' );



function staff_cpt() {
    $args = array(
        'label'  => 'Staff Profiles',
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'taxonomies' => array('staff', 'category' ),
    );

    register_post_type( 'staff', $args );
}

add_action( 'init', 'staff_cpt' );
