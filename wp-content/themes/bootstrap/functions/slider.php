<?php 

function slider_cpt() {
    $args = array(
        'label'  => 'Slider',
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'taxonomies' => array('slider', 'category' ),
    );

    register_post_type( 'slider', $args );
}

add_action( 'init', 'slider_cpt' );

?>