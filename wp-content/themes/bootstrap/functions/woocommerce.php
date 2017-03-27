<?php 

/*add theme support*/
function woocommerce_content() {

	if ( is_singular( 'product' ) ) {

	  while ( have_posts() ) : the_post();

	    wc_get_template_part( 'content', 'single-product' );

	  endwhile;

	} else { ?>

	  <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

	    <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

	  <?php endif; ?>

	  <?php do_action( 'woocommerce_archive_description' ); ?>

	  <?php if ( have_posts() ) : ?>

	    <?php do_action('woocommerce_before_shop_loop'); ?>

	    <?php woocommerce_product_loop_start(); ?>

	      <?php woocommerce_product_subcategories(); ?>

	      <?php while ( have_posts() ) : the_post(); ?>

	        <?php wc_get_template_part( 'content', 'product' ); ?>

	      <?php endwhile; // end of the loop. ?>

	    <?php woocommerce_product_loop_end(); ?>

	    <?php do_action('woocommerce_after_shop_loop'); ?>

	  <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

	    <?php wc_get_template( 'loop/no-products-found.php' ); ?>

	  <?php endif;

	}
}

/**
 * Add the field to the checkout Student First Name
 */


function student_first_name( $checkout ) {
    echo '<div id="student_first_name"><h2>Student Details</h2>';
    woocommerce_form_field( 'student_first', array(
        'type'          => 'text',
        'class'         => array('form-row form-row form-row-first validate-required'),
        'label'         => __('First Name<abbr class="required" title="required">*</abbr>'),
        'placeholder'   => __(''),
        ), $checkout->get_value( 'student_first' ));
    echo '</div>';
}

/**
 * Process the checkout Student First Name
 */

add_action('woocommerce_checkout_process', 'check_student_first_name');

function check_student_first_name() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['student_first'] )
        wc_add_notice( __( 'Please Enter Students First Name.' ), 'error' );
}

/**
 * Add the field to the checkout Student last Name
 */

function student_last_name( $checkout ) {
    woocommerce_form_field( 'student_last', array(
        'type'          => 'text',
        'class'         => array('form-row form-row form-row-last validate-required'),
        'label'         => __('last Name<abbr class="required" title="required">*</abbr>'),
        'placeholder'   => __(''),
        ), $checkout->get_value( 'student_last' ));
}

/**
 * Process the checkout Student last Name
 */

function check_student_last_name() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['student_last'] )
        wc_add_notice( __( 'Please Enter Students last Name.' ), 'error' );
}

/**
 * Add the field to the checkout Student ID
 */

function student_id( $checkout ) {
    woocommerce_form_field( 'student_id', array(
        'type'          => 'text',
        'class'         => array('form-row form-row form-row-first'),
        'label'         => __('Student ID'),
        'placeholder'   => __(''),
        ), $checkout->get_value( 'student_id' ));
}


function secure_payment_check_out() { ?>
    <div class="secure_payment_check_out">

	    <h2>Make A Secure Payment</h2>
	    <p>Use the form below to make a secure payment through <a href="http://www.paymentexpress.co.nz/">Payment Express.</a></p>

	    <p>Once the required fields have been submitted, you will be redirected to <a href="http://www.paymentexpress.co.nz/">Payment Express</a> where you can securely complete your payment using a debit or credit card. We accept debit card and credit card payments from Visa and MasterCard.</p>

	    <p>PLEASE NOTE: You will receive an email confirmation following your payment submission. If you do not receive this notification, please check any Junk or Spam folders in your email account. If you cannot find a confirmation notification, please contact JPC directly at <a href="mailto:uniform@jpc.school.nz">uniform@jpc.school.nz</a></p>

	    <p>Orders must be collected from the John Paul College Uniform Shop.<br>
	    To collect your order please remember to bring your receipt.<br>
	    The uniform shop is open on Monday, Wednesday and Friday 8.00am to 4pm.</p>

    </div>

<?php }


/**
 * Add the field to the checkout Terms and Conditions
 */

function terms_and_conditions( $checkout ) {
    echo '<a href="/terms-and-conditions/" target="blank"><div id="terms_and_conditions"><h2>Terms and Conditions</h2></a>';
    woocommerce_form_field( 'ts&cs', array(
        'type'          => 'checkbox',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('I have read the Terms and Conditions.'),
        'placeholder'   => __('Enter something'),
        ), $checkout->get_value( 'ts&cs' ));
    echo '</div>';
}

/**
 * Process the checkout
 */

function ts_and_cs() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['ts&cs'] )
        wc_add_notice( __( 'Please read and accept our T&Cs.' ), 'error' );
}


function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['student_first']) update_post_meta( $order_id, 'student_first', esc_attr($_POST['student_first']));
    if ($_POST['student_last']) update_post_meta( $order_id, 'student_last', esc_attr($_POST['student_last']));
    if ($_POST['student_id']) update_post_meta( $order_id, 'student_id', esc_attr($_POST['student_id']));
}

/**
* Add Continue Shopping Button on Cart Page
*/

function woo_add_continue_shopping_button_to_cart() { ?>
    <button class="button wc-backward" href="<?php echo esc_url( apply_filters( "woocommerce_return_to_shop_redirect", wc_get_page_permalink( "shop" ) ) ); ?>">
    <?php _e( "Return To Shop", "woocommerce" ) ?>
    </button>
<?php 
}


function quantity_input_args( $args, $product ) {
  if ( is_singular( 'product' ) ) {
    $args['input_value']  = 1;  // Starting value (we only want to affect product pages, not cart)
  }
  $args['min_value']  = 1;    // Minimum value
  return $args;
}

function dubzz_woocommerce_available_variation( $args ) {
  $args['min_qty'] = 1;     // Minimum value (variations)
  return $args;
}

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

function hide_coupon_field( $enabled ) {
    if ( is_cart() || is_checkout() ) {
        $enabled = false;
    }
    return $enabled;
}

function custom_override_checkout_fields( $fields ) {
  	$fields['order']['order_comments']['placeholder'] = 'Any special notes about your order or pick up time/date you may wish to include';

 	return $fields;
}

function custom_override_default_address_fields( $address_fields ) {
 	unset($address_fields['company']);
 	unset($address_fields['country']);
	unset($address_fields['address_1']);
	unset($address_fields['address_2']);
	unset($address_fields['city']);
	unset($address_fields['state']);
	unset($address_fields['postcode']);

 	return $address_fields;
}


function custom_woocommerce_email_order_meta( $order, $sent_to_admin, $plain_text ) {
    
    $post_id = $order->get_order_number();

    $billing_first = get_post_meta( $post_id, '_billing_first_name', true );
    $billing_last =  get_post_meta( $post_id, '_billing_last_name', true );
    $billing_name = $billing_first . " " . $billing_last;

    $student_first = get_post_meta( $post_id, 'student_first', true );
    $student_last =  get_post_meta( $post_id, 'student_last', true );
    $student_id = get_post_meta( $post_id, 'student_id', true );
    $student_name = $student_first . " " . $student_last;

    $student_phone = get_post_meta( $post_id, '_billing_phone', true );
    $student_email = get_post_meta( $post_id, '_billing_email', true );

    echo "<h3>Order Details:</h3>";
    echo "<b>Billing Name:</b> " . $billing_name . "<br>";
    echo "<b>Student Name:</b> " . $student_name . "<br>";
    echo "<b>Student Number:</b> " . $student_id . "<br>";
    echo "<b>Phone:</b> " . $student_phone ." <br>";
    echo "<b>Email:</b> " . $student_email . "<br><br>";
    
}


function change_admin_email_subject( $subject, $order ) {
    global $woocommerce;

    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    $subject = sprintf( 'JPC Uniform Shop order Receipt #%s', $order->id );

    return $subject;
}


function productControls() {
    echo "<div id='productControls'></div>";
}

function adjust_woocommerce_get_order_item_totals( $totals ) {
  unset($totals['cart_subtotal']  );
  return $totals;
}

// adds notice at single product page above add to cart
function return_policy() {
    echo '<p id="return">If you are unsure of the size, please select the closest and you will be able to change when the item is picked up.</p>';
}



 ?>