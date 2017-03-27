<?php
//add_filter( 'show_admin_bar', '__return_false' );

require_once('functions/navwalker.php');

function register_theme_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Menu' )
    )
  );
}

add_action( 'init', 'register_theme_menus' );

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'woocommerce' );

set_post_thumbnail_size( 600, 450, array( 'center', 'center')  );

/*************************/

get_template_part( 'functions/enqueue' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );

get_template_part( 'functions/functions' );

get_template_part( 'functions/woocommerce' );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 100;' ), 20 );
add_filter( 'woocommerce_quantity_input_args', 'quantity_input_args', 10, 2 );
add_filter( 'woocommerce_available_variation', 'dubzz_woocommerce_available_variation' );
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field' );
add_action( 'woocommerce_review_order_before_submit', 'woo_add_continue_shopping_button_to_cart' );
add_action( 'woocommerce_before_order_notes', 'student_first_name' );
add_action( 'woocommerce_before_order_notes', 'student_last_name' );
add_action( 'woocommerce_checkout_process', 'check_student_last_name');
add_action( 'woocommerce_before_order_notes', 'student_id' );
add_action( 'woocommerce_before_order_notes', 'secure_payment_check_out' );
add_action( 'woocommerce_before_order_notes', 'terms_and_conditions' );
add_action( 'woocommerce_checkout_process', 'ts_and_cs');
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );
add_action( 'woocommerce_email_order_meta', 'custom_woocommerce_email_order_meta', 10, 3 );
add_filter( 'woocommerce_email_subject_new_order', 'change_admin_email_subject', 1, 2);
add_action( 'woocommerce_before_shop_loop', 'productControls', 10 );
add_filter( 'woocommerce_get_order_item_totals', 'adjust_woocommerce_get_order_item_totals' );
add_action( 'woocommerce_single_product_summary', 'return_policy', 20 );


get_template_part( 'functions/slider' );


get_template_part( 'functions/widgets' );
create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );

create_widget( 'Shop Sidebar', 'shop', 'Displays on the side of the shop pages' );

create_widget( 'Footer Left' , 'foot-left' , 'Displays on left of the Footer');
create_widget( 'Footer Center' , 'foot-center' , 'Displays on center of the Footer');
create_widget( 'Footer Right' , 'foot-right' , 'Displays on right of the Footer');

get_template_part( 'functions/filters' );
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

?>