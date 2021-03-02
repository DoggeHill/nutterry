<?php

define( 'THEME_DIRECTORY', get_template_directory() );
define( 'THEME_DIRECTORY_URI', get_template_directory_uri() );
define( 'SEDUCO_WOOCOMMERCE_IS_ACTIVE',   class_exists( 'WooCommerce' ) );

define( 'SEDUCO_IMAGES', THEME_DIRECTORY_URI . '/images' );
define( 'SEDUCO_FRAMEWORK', THEME_DIRECTORY.      '/inc' );
define( 'SEDUCO_VENDOR', THEME_DIRECTORY_URI . '/vendor' );

define('MININMAL_BUY_PRICE', get_field( 'minimalna_nakupna_cena', 'option' ));
define('MINIMAL_HOME_DELIVER_PRICE', get_field( 'minumana_suma_na_dorucenie_domov', 'options' ));
define('SHIPPING_NUTTERY_KURIER_PRICE', 6);
define('SHIPPING_DORUCENIE_DOMOV_PRICE', 3);
define('FREE_SHIPPING_NUTTERY_KURIER', get_field( 'dorucenie_domov_zadarmo_od_', 'options' ));


require_once SEDUCO_FRAMEWORK . '/nakup-na-firmu.php';
require_once SEDUCO_FRAMEWORK . '/favicon/favicon.php';
require_once SEDUCO_FRAMEWORK . '/wholesale.php';
require_once SEDUCO_FRAMEWORK . '/seduco-ajax/seduco-ajax.php';


global $allowed_actions;
$allowed_actions = array(
  'update_wholesale_cart',
   
);  


add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_template_directory() . '/acf-json';
    
    
    // return
    return $path;
    
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_template_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}




// SETUP

function seduco_setup() {



  add_theme_support( 'menus' );
  add_theme_support( 'editor' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

  add_image_size( 'xswoo', 150 , 150);
  add_image_size( 'smwoo', 500 ,500);
  add_image_size( 'mdwoo', 800 ,800);
  add_image_size( 'xxlwoo', 1100 , 1100);

  add_image_size( 'mdblog', 500 ,500);
  add_image_size( 'lgblog', 800 ,800);
  add_image_size( 'xlblog', 1400 ,800);







}
add_action( 'init', 'seduco_setup' );

function replace_core_jquery_version() {
   
	  wp_enqueue_script( 'seduco-nakupny-proces-js', get_template_directory_uri() . '/seduco-core/seduco-nakupny-proces.js', array('jquery'), '20150705', true );
	  wp_enqueue_style('seduco-nakupny-proces-css', get_template_directory_uri() . '/seduco-core/seduco-nakupny-proces.css'	);
}



add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );








function add_classes_on_li($classes, $item, $args) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}





function seduco_scripts() {


  wp_enqueue_script( 'VALIDATOR_WOO', get_template_directory_uri() . '/woocommerce/woo-assets/vendor/validator.min.js', array('jquery'), '20150705', true );



if (!is_checkout() && !is_cart()) {
 

  wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/assets/node_modules/popper/dist/popper.min.js', array('jquery'), '20150705', true );


  wp_enqueue_script( 'jquery-gmaps', get_template_directory_uri() . '/assets/node_modules/bootstrap/js/bootstrap.min.js', array('jquery'), '20150705', true );





  wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/assets/node_modules/aos/dist/aos.js', array('jquery'), '20150705', true );

  wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20150705', true );

  wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/node_modules/owl.carousel/dist/owl.carousel.min.js', array('jquery'), '20150705', true );

  wp_enqueue_script( 'touch-swipe-js', get_template_directory_uri() . '/assets/node_modules/jquery.touchSwipe.min.js', array('jquery'), '20150705', true );
  wp_enqueue_script( 'touch-slider-js', get_template_directory_uri() . '/assets/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.js', array('jquery'), '20150705', true );

  wp_enqueue_script( 'pscrollbar-js', get_template_directory_uri() . '/assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js', array('jquery'), '20150705', true );
  
  wp_enqueue_script( 'type-js', get_template_directory_uri() . '/js/type.js', array('jquery'), '20150705', true );

  wp_enqueue_script( 'testimoniaj.js', get_template_directory_uri() . '/js/testimonial.js', array('jquery'), '20150705', true );

  wp_enqueue_script( 'prism-js', get_template_directory_uri() . '/assets/node_modules/prism/prism.js', array('jquery'), '20150705', true );


    wp_enqueue_script( 'tippyjs', get_template_directory_uri() . '/seduco-core/tippy.all.min.js' , array('jquery'), '20150705', true );



	wp_enqueue_script( 'SLICK_JS', get_template_directory_uri() . '/seduco-core/slick/slick.min.js', array(), '201904', true );
	
  wp_enqueue_script( 'lightcase', get_template_directory_uri() . '/seduco-core/lightcase/js/lightcase.js', array(), '201904', true );


	// Register the script
	wp_register_script( 'seduco-core-js', get_template_directory_uri() . '/seduco-core/seduco-core.js' );
// Localize the script with new data
	$translation_array = array(
		'komentar' => __( 'Komentár', 'nuttery' ),
		'kdeNajdeteNuttery' => __( 'Kde nájdete Nuttery', 'nuttery' ),
		'recepty' => __( 'Recepty', 'nuttery' ),
		'ziadneVysledky' => __( 'Nenašli sa žiadne výsledky', 'nuttery' ),
	);
	wp_localize_script( 'seduco-core-js', 'translations', $translation_array );

  wp_enqueue_script( 'seduco-core-js', get_template_directory_uri() . '/seduco-core/seduco-core.js', array('jquery'), '20150705', true );





 


// STYLES


wp_enqueue_style(
    'seduco-theme-sastyle445', get_template_directory_uri() . '/assets/node_modules/bootstrap/css/bootstrap.min.css'
  );




  wp_enqueue_style(
    'aos', get_template_directory_uri() . '/assets/node_modules/aos/dist/aos.css'
  );

  wp_enqueue_style(
    'prism', get_template_directory_uri() . '/assets/node_modules/prism/prism.css'
  );

  wp_enqueue_style(
    'pscr', get_template_directory_uri() . '/assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css'
  );

  wp_enqueue_style(
    'headers', get_template_directory_uri() . '/css/headers1-10.css'
  );

  wp_enqueue_style(
    'fea10', get_template_directory_uri() . '/css/features11-20.css'
  );

  wp_enqueue_style(
    'fea40', get_template_directory_uri() . '/css/features41-50.css'
  );


wp_enqueue_style(
    'sslider', get_template_directory_uri() . '/css/static-slider1-10.css'
  );

  
  wp_enqueue_style(
    'owlgreen', get_template_directory_uri() . '/assets/node_modules/owl.carousel/dist/assets/owl.theme.green.css'
  );


wp_enqueue_style(
    'pricing', get_template_directory_uri() . '/css/pricing/pricing.css'
  );

wp_enqueue_style(
    'bstslider', get_template_directory_uri() . '/assets/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.css'
  );





  wp_enqueue_style(
    'cta', get_template_directory_uri() . '/css/c2a.css'
  );



  wp_enqueue_style(
    'shop', get_template_directory_uri() . '/css/shop/shop.css'
  );

  wp_enqueue_style(
    'blog-home', get_template_directory_uri() . '/css/blog-homepage.css
'
  );


 wp_enqueue_style(
    'formssss', get_template_directory_uri() . '/css/form.css
'
  );


  wp_enqueue_style(
    'footers', get_template_directory_uri() . '/css/footers.css
'
  );


   wp_enqueue_style(
    'slider5', get_template_directory_uri() . '/css/slider5.css
'
  );



   wp_enqueue_style(
    'testimonials', get_template_directory_uri() . '/css/testimonial1-10.css
'
  );


     wp_enqueue_style(
    'team', get_template_directory_uri() . '/css/team.css
'
  );





   



    wp_enqueue_style(
        'style-nuttery', get_template_directory_uri() . '/css/style.css'
    );

 



      wp_enqueue_style(
    'seduco-responsive', get_template_directory_uri() . '/seduco-core/seduco-core-responsive.css
'
  );

	wp_enqueue_style( 'SLICK_CSS', get_template_directory_uri() . '/seduco-core/slick/slick.css' );
	wp_enqueue_style( 'SLICK_CSS', get_template_directory_uri() . '/seduco-core/slick/slick-theme.css' );


 
}



 wp_enqueue_script( 'SWALL', 'https://cdn.jsdelivr.net/npm/sweetalert2@8', array('jquery'), '20150705', true );

    wp_enqueue_style(
    'seduco-core-css', get_template_directory_uri() . '/seduco-core/seduco-core.css
'
  );


       wp_enqueue_style(
    'seduco-global-css', get_template_directory_uri() . '/seduco-core/seduco.css
'
  );

               wp_enqueue_style(
    'seduco-main-scss', get_template_directory_uri() . '/seduco-core/css/seduco-main.css
'
  );
              wp_enqueue_style(
    'seduco-floating-labels', get_template_directory_uri() . '/seduco-core/css/seduco-floating-labels.css
'
  );

}



  add_action( 'wp_enqueue_scripts', 'seduco_scripts' );












function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Hlavné menu' ),
      'footer-menu' => __( 'Footer menu' ),
      'extra-menu' => __( 'Extra Menu (Aktuálna tém ho nemusí podporovať.)' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );



function kosik_disable() {
  $text;
 if (is_cart()) {
  $text = "pointer-events:none; display:none;";
 }
  
  return $text;
}




/*REMOVE META
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
*/


/* ODSTRANENIE RECENZII Z TABU A PREMIESTNENIE */

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] );  // Removes the reviews tab
    unset( $tabs['additional_information'] );  // Removes the additional information tab
    return $tabs;
}
add_action( 'recenzie', 'comments_template', 50 );



// ODSTRANENIE TABOV
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );



// REMOVE SIDEBAR

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// REMOVE UPSELLS

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );


// REMOVE RELATED PRODUCTS

//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

// REMOVE CROSS SELL
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// WIDGETS

function wpb_widgets_init() {
 
    register_sidebar( array(
        'name' => __( '1. Sidebar', 'wpb' ),
        'id' => 'sidebar-1',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );


    register_sidebar( array(
        'name' => __( '2. Sidebar', 'wpb' ),
        'id' => 'sidebar-2',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( '3. Sidebar', 'wpb' ),
        'id' => 'sidebar-3',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );



    }
 
 
add_action( 'widgets_init', 'wpb_widgets_init' );






// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );


// Remove uncategorized category from shop page.

add_filter( 'woocommerce_product_subcategories_args', 'remove_uncategorized_category' );
/**
 * Remove uncategorized category from shop page.
 *
 * @param array $args Current arguments.
 * @return array
 **/
function remove_uncategorized_category( $args ) {
  $uncategorized = get_option( 'default_product_cat' );
  $args['exclude'] = $uncategorized;
  return $args;
}






//Remove Sales Flash
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash()
{
    return false;
}




//AJAX CART COUNT

add_filter('add_to_cart_fragments', 'header_add_to_cart_fragment');
function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
 
    ob_start();
 
    woocommerce_cart_link();
 
    $fragments['#counter-num'] = ob_get_clean();
 
    return $fragments;
 
}
 
function woocommerce_cart_link() {
    global $woocommerce;
    ?>

    <span id="counter-num"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>

    <?php
}


// Change add to cart text on archives depending on product type
add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +
  
function woo_custom_single_add_to_cart_text() {
  
    return __( 'Kúpiť', 'woocommerce' );
  
}









/**
* Returns ID of top-level parent category, or current category if you are viewing a top-level
*
* @param  string    $catid    Category ID to be checked
* @return   string    $catParent  ID of top-level parent category
*/

function pa_category_top_parent_id ($catid) {

 while ($catid) {
  $cat = get_category($catid); // get the object for the catid
  $catid = $cat->category_parent; // assign parent ID (if exists) to $catid
  // the while loop will continue whilst there is a $catid
  // when there is no longer a parent $catid will be NULL so we can assign our $catParent
  $catParent = $cat->cat_ID;
 }

return $catParent;
}



// Disable variation price range


//add_filter( 'woocommerce_variable_sale_price_html', 'bbloomer_variation_price_format', 10, 2 );
//add_filter( 'woocommerce_variable_price_html', 'bbloomer_variation_price_format', 10, 2 );
 
function bbloomer_variation_price_format( $price, $product ) {
 
// Main Price
$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
$price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
// Sale Price
$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
sort( $prices );
$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
if ( $price !== $saleprice ) {
$price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
}
return $price;
}







// Declare WooCommerce


 add_theme_support( 'woocommerce', apply_filters( 'seduco_woocommerce_args', array(
 'single_image_width'    => 800,
 'thumbnail_image_width' => 324,
 'product_grid'          => array(
 'default_columns' => 3,
 'default_rows'    => 4,
 'min_columns'     => 1,
 'max_columns'     => 6,
 'min_rows'        => 1
 )
) ) );











// REMOVE RELADTED PRODUCTS 

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );



if ( ! function_exists( 'twentyten_comment' ) ) :
    /**
     * Template for comments and pingbacks.
     *
     * To override this walker in a child theme without modifying the comments template
     * simply create your own twentyten_comment(), and that function will be used instead.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     * @since Twenty Ten 1.0
     *
     * @param object $comment The comment object.
     * @param array  $args    An array of arguments. @see get_comment_reply_link()
     * @param int    $depth   The depth of the comment.
     */
    function twentyten_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case '':
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 40 ); ?>
                <?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            </div><!-- .comment-author .vcard -->
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(), get_comment_time() );
                    ?>
                    </a>
                    <?php
                    edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
                ?>
                </div><!-- .comment-meta .commentmetadata -->

                <div class="comment-body"><?php comment_text(); ?></div>

                <div class="reply">
                <?php
                comment_reply_link(
                    array_merge(
                        $args, array(
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                        )
                    )
                );
?>
                </div><!-- .reply -->
            </div><!-- #comment-##  -->

        <?php
                break;
            case 'pingback':
            case 'trackback':
        ?>
        <li class="post pingback">
        <p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
    <?php
                break;
        endswitch;
    }
endif;


function my_update_comment_fields( $fields ) {

  $commenter = wp_get_current_commenter();
  $req       = get_option( 'require_name_email' );
  $label     = $req ? '*' : ' ' . __( '(optional)', 'text-domain' );
  $aria_req  = $req ? "aria-required='true'" : '';

  $fields['author'] =
    '<p style="padding-right:15px;" class="comment-form-author">
      <label for="author">' . __( "Name", "text-domain" ) . $label . '</label>
      <input  id="author" name="author" type="text" placeholder="' . esc_attr__( "Meno", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30" ' . $aria_req . ' />
    </p>';

  $fields['email'] =
    '<p style="padding-left:15px;" class="comment-form-email">
      <label for="email">' . __( "Email", "text-domain" ) . $label . '</label>
      <input  id="email" name="email" type="email" placeholder="' . esc_attr__( "E-mail", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
    '" size="30" ' . $aria_req . ' />
    </p>';

  $fields['url'] =
    '<p class="comment-form-url">
      <label for="url">' . __( "Website", "text-domain" ) . '</label>
      <input id="url" name="url" type="url"  placeholder="' . esc_attr__( "http://google.com", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" />
      </p>';

  return $fields;
}
add_filter( 'comment_form_default_fields', 'my_update_comment_fields' );


function wpbeginner_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');

function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
 
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );



// on single blog post pages with comments open and threaded comments
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
    // enqueue the javascript that performs in-link comment reply fanciness
    wp_enqueue_script( 'comment-reply' ); 
}




/**
 * SEDUCO NAKUPNY PROCES
 */

require get_template_directory() . '/woocommerce/woo-assets/funkcie-nakupny-proces.php';






function get_title_shipping_method_from_method_id_nut( $method_rate_id = '' ){
    if( ! empty( $method_rate_id ) ){
        $method_key_id = str_replace( ':', '_', $method_rate_id ); // Formating
        $option_name = 'woocommerce_'.$method_key_id.'_settings'; // Get the complete option slug
        return get_option( $option_name, true )['title']; // Get the title and return it
    } else {
        return false;
    }
}

  
function wc_cart_totals_shipping_method_label_nut( $method ) {
    $label = "";

    if ( $method->cost > 0 ) {
        if ( WC()->cart->display_prices_including_tax() ) {
            $label .= '' . wc_price( $method->cost + $method->get_shipping_tax() );
            if ( $method->get_shipping_tax() > 0 && ! wc_prices_include_tax() ) {
                $label .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
            }
        } else {
            $label .= '' . wc_price( $method->cost );
            if ( $method->get_shipping_tax() > 0 && wc_prices_include_tax() ) {
                $label .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
            }
        }
    }

    return apply_filters( 'woocommerce_cart_shipping_method_full_label', $label, $method );
}



function wc_cart_totals_shipping_html_nut() {
    $packages = WC()->shipping->get_packages();
    $first    = true;

    foreach ( $packages as $i => $package ) {
        $chosen_method = isset( WC()->session->chosen_shipping_methods[ $i ] ) ? WC()->session->chosen_shipping_methods[ $i ] : '';
        $product_names = array();

        if ( sizeof( $packages ) > 1 ) {
            foreach ( $package['contents'] as $item_id => $values ) {
                $product_names[ $item_id ] = $values['data']->get_name() . ' &times;' . $values['quantity'];
            }
            $product_names = apply_filters( 'woocommerce_shipping_package_details_array', $product_names, $package );
        }

        wc_get_template( 'cart/cart-shippings.php', array(
            'package'                  => $package,
            'available_methods'        => $package['rates'],
            'show_package_details'     => sizeof( $packages ) > 1,
            'show_shipping_calculator' => is_cart() && $first,
            'package_details'          => implode( ', ', $product_names ),
            // @codingStandardsIgnoreStart
            'package_name'             => apply_filters( 'woocommerce_shipping_package_name', sprintf( _nx( 'Shipping', 'Shipping %d', ( $i + 1 ), 'shipping packages', 'woocommerce' ), ( $i + 1 ) ), $i, $package ),
            // @codingStandardsIgnoreEnd
            'index'                    => $i,
            'chosen_method'            => $chosen_method,
        ) );

        $first = false;
    }
}


/**
 * Add quantity field on the archive page.
 */
function custom_quantity_field_archive() {
  $product = wc_get_product( get_the_ID() );
  if ( ! $product->is_sold_individually() && 'variable' != $product->product_type && $product->is_purchasable() ) {
    woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
  }
}
add_action( 'woocommerce_after_shop_loop_item', 'custom_quantity_field_archive', 0, 9 );


add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['.header-cart-count'] = '<span class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    
    return $fragments;
    
}


/**
* @snippet       Disable Postcode/ZIP Validation @ WooCommerce Checkout
* @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode    https://businessbloomer.com/?p=20203
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 3.5.3
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
 
add_filter( 'woocommerce_checkout_fields' , 'remove_postcode_validation', 99 );

function remove_postcode_validation( $fields ) {

unset($fields['billing']['billing_postcode']['validate']);
unset($fields['shipping']['shipping_postcode']['validate']);

return $fields;
}



add_action( 'wp_footer', 'trigger_for_ajax_add_to_cart' );
function trigger_for_ajax_add_to_cart() {
    ?>
        <script type="text/javascript">
            (function($){
                $('body').on( 'wc_cart_button_updated', function(){
                    // Testing output on browser JS console
                    console.log('added_to_cart'); 
                    // Your code goes here

                   

                      $(".quantity-nut").each(function(n) {


                         $(this).find('.quantity, .add_to_cart_button').hide();
                          
                            
                          
                    });
                });
            })(jQuery);
        </script>
    <?php
}



function wc_varb_price_range( $wcv_price, $product ) {
 
    $prefix = sprintf('%s ', __('<span class="prefix-od">Od</span>', 'wcvp_range'));
 
    $wcv_reg_min_price = $product->get_variation_regular_price( 'min', true );
    $wcv_min_sale_price    = $product->get_variation_sale_price( 'min', true );
    $wcv_max_price = $product->get_variation_price( 'max', true );
    $wcv_min_price = $product->get_variation_price( 'min', true );
 
    $wcv_price = ( $wcv_min_sale_price == $wcv_reg_min_price ) ?
        wc_price( $wcv_reg_min_price ) :
        '<del>' . wc_price( $wcv_reg_min_price ) . '</del>' . '<ins>' . wc_price( $wcv_min_sale_price ) . '</ins>';
 
    return ( $wcv_min_price == $wcv_max_price ) ?
        $wcv_price :
        sprintf('%s%s', $prefix, $wcv_price);
}
 
add_filter( 'woocommerce_variable_sale_price_html', 'wc_varb_price_range', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_varb_price_range', 10, 2 );




function chladenyProdukt() {

          $dlhaDoba = false;        
          foreach ( WC()->cart->get_cart() as $cart_item ) {
              $product = $cart_item['data'];
                if(!empty($product)){
                  
                  if (get_field( 'dlhsia_doba_dodania', $cart_item['product_id'])) {
                    $dlhaDoba = true;



                  } 
   
                   
                }


               } 
              //return $dlhaDoba;
               return true;
}



require get_template_directory() . '/seduco-core/checkPlaces/checkPlaces.php';



class IBenic_Walker extends Walker_Nav_Menu {
    
  // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
      $object = $item->object;
      $type = $item->type;
      $title = $item->title;
      $description = $item->description;
      $permalink = $item->url;
      $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

      $katobr = get_field( 'obrazok' ,$item);
      $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)


    
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
        $output .= '<a href="' . $permalink . '">';

       
  
        
      } else {
        $output .= '<span>';
      }
       
      $output .= $title;


       if( $katobr ) {

          $output .= wp_get_attachment_image( $katobr, $size );
        }
      if( $description != '' && $depth == 0 ) {
        $output .= '<small class="description">' . $description . '</small>';
      }
      if( $permalink && $permalink != '#' ) {
        $output .= '</a>';
      } else {
        $output .= '</span>';
      }
    }
}


function cloudways_custom_checkout_fields($fields){
    $fields['cloudways_extra_fields'] = array(
            
            'cloudways_dropdown' => array(
                'type'          => 'checkbox',
                'class'         => array('form-row privacy'),
                'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
                'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
                'required'      => false,
                'label'         => __( 'Súhlasím so zasielaním marketingových materiálov.
            </a>', 'seduco' )


                )
            );
 
    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'cloudways_custom_checkout_fields' );


/**
* @snippet Remove the Postcode Field on the WooCommerce Checkout
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=461
* @author Rodolfo Melogli
* @testedwith WooCommerce 3.5.1
*/
 
add_filter( 'woocommerce_checkout_fields' , 'bbloomer_remove_billing_postcode_checkout' );
 
function bbloomer_remove_billing_postcode_checkout( $fields ) {
  unset($fields['billing']['billing_postcode']);
  return $fields;
}
 
function cloudways_extra_checkout_fields(){
 
    $checkout = WC()->checkout(); ?>

    <?php
       foreach ( $checkout->checkout_fields['cloudways_extra_fields'] as $key => $field ) : ?>
 
            <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
 
        <?php endforeach; ?>

 
<?php }
add_action( 'woocommerce_review_order_before_submit' ,'cloudways_extra_checkout_fields' );
 


function cloudways_save_extra_checkout_fields( $order_id, $posted ){
 
    if( isset( $posted['cloudways_dropdown'] ) ) {
        update_post_meta( $order_id, '_cloudways_dropdown', $posted['cloudways_dropdown'] );
    }
}
add_action( 'woocommerce_checkout_update_order_meta', 'cloudways_save_extra_checkout_fields', 10, 2 );


  function cloudways_display_order_data_in_admin( $order ){  ?>
    <div class="order_data_column">
 
        <h4><?php _e( 'Súhlas na marketingové účely', 'nuttery' ); ?></h4>
        <div class="address">
        <?php
      
            if (get_post_meta( $order->get_id(), '_cloudways_dropdown', true ) == 1) {
               echo "Áno";
             } else {
              echo "Nie";
             } ?>
        </div>
        <div class="edit_address">
          
            <?php woocommerce_wp_text_input( array( 'id' => '_cloudways_dropdown', 'label' => __( 'Súhlas', 'nuttery' ), 'wrapper_class' => '_billing_company_field' ) ); ?>
        </div>
    </div>
<?php }
add_action( 'woocommerce_admin_order_data_after_order_details', 'cloudways_display_order_data_in_admin' ); 



 
function action_woocommerce_review_order_before_submit() { 
  ?>

      <p class="op" style="display: none;" ><?php _e('Stlačením "Odoslať objednávku" súhlasíte s', 'nuttery'); ?> <a href="<?php echo get_permalink(get_option( 'woocommerce_terms_page_id' ));  ?>"><?php _e('obchodnými podmienkami', 'nuttery'); ?></a>.</p>
  <?php  
  
}; 
         
// add the action 
add_action( 'woocommerce_review_order_before_submit', 'action_woocommerce_review_order_before_submit', 10, 0 ); 



/**
 * Set a minimum order amount for checkout
 */
//add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
//add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );
 
function wc_minimum_order_amount() {
    // Set this variable to specify a minimum order value
    $minimum = MININMAL_BUY_PRICE;

    if ( WC()->cart->total < $minimum ) {

        if( is_checkout() ) {

            wc_add_notice( 
                sprintf( '<p>'.__('Vaša hodnota objednávky je %s — musíte nakúpiť minimálne za %s aby ste mohli dokončiť objednávku.', 'nuttery').' <a href="'.get_permalink( wc_get_page_id( 'shop' ) ).'">'.__('Dokúpiť v e-shope', 'nuttery').'</a></p><p class="over-amount">'.__('Pri nákupe nad','nuttery') . wc_price(MINIMAL_HOME_DELIVER_PRICE) . __('možnosť donášky k vám domov.' , 'nuttery').'<a href="'.get_permalink( wc_get_page_id( 'shop' ) ).'"> '.__('Dokúpiť v e-shope', 'nuttery').'</a></p>' ,
                    wc_price( WC()->cart->total ), 
                    wc_price( $minimum )
                ), 'error' 
            );

        }
    }
}

add_filter( 'facetwp_facet_dropdown_show_counts', '__return_false' );


  add_action('wp_ajax_my_action','data_fetch');
  add_action('wp_ajax_nopriv_my_action','data_fetch');
  function data_fetch(){
	  $slug = $_POST['slug'];
	  if($slug == '') {
	    echo '<h5 id="nazov-kategorie-ciste">'.__('Recepty','nuttery').'</h5>';
    }else {
		  $product = get_page_by_path($slug, OBJECT, 'product');

		  echo '<div class="row">
  <div class="col-sm-3">';

		  echo get_the_post_thumbnail($product);

		  echo '</div>
  <div class="col-sm-8">
    <div class="row main-nadpis-wrapper">
      <h5 id="nazov-kategorie">';
		  echo esc_html(get_the_title($product));
		  echo '</h5>
              <a href="';
		  echo get_post_permalink($product);
		  echo '">'.__('Do obchodu','nuttery').'</a>
                  </div>
                </div>
              </div>';
	  }
  die();
  }

  /**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug( $post_link, $post ) {
	if ( 'portfolio' === $post->post_type && 'publish' === $post->post_status ) {
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	}
	return $post_link;
}
//add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 2 );



add_action( 'woocommerce_after_checkout_billing_form', 'add_box_option_to_checkout' );
function add_box_option_to_checkout( $checkout ) {
    echo '<div style="display:none;" id="message_fields">';
    woocommerce_form_field( 'add_gift_box', array(
        'type'          => 'checkbox',
        'class'         => array('add_gift_box form-row-wide'),
         
        'label'         => __('Osobný odber na predajni', 'nuttery'),
        'placeholder'   => __(''),
        ), $checkout->get_value( 'add_gift_box' ));
        echo '</div>';
}


add_action( 'wp_footer', 'woocommerce_add_gift_box' );
function woocommerce_add_gift_box() {
    if (is_checkout()) {
    ?>
    <script type="text/javascript">
    jQuery( document ).ready(function( $ ) {
        $('#store_pickup').click(function(){

          if (!$(this).hasClass('active')) {
          $('#add_gift_box').trigger('click');
            jQuery('body').trigger('update_checkout');
            }
        });


        $('#home_delivery').click(function(){

          if (!$(this).hasClass('disabled') && $('#store_pickup').hasClass('active')) {
          $('#add_gift_box').trigger('click');
            jQuery('body').trigger('update_checkout');
            }
        });
    });
    </script>
    <?php
    }
}


add_action( 'woocommerce_cart_calculate_fees', 'woo_add_cart_fee' );
function woo_add_cart_fee( $cart ){
        if ( ! $_POST || ( is_admin() && ! is_ajax() ) ) {
        return;
    }

    if ( isset( $_POST['post_data'] ) ) {
        parse_str( $_POST['post_data'], $post_data );
    } else {
        $post_data = $_POST; // fallback for final checkout (non-ajax)
    }

    if (isset($post_data['add_gift_box'])) {
       // $extracost = 25; // not sure why you used intval($_POST['state']) ?
       //  WC()->cart->add_fee( 'Ozdobne pudełka:', $extracost );
        WC()->session->set('chosen_shipping_methods', array( 'flat_rate:5' ) );
    } else {
      WC()->session->set('chosen_shipping_methods', array( 'flat_rate:1' ) );
    }

}

function my_theme_load_theme_textdomain() {
    load_theme_textdomain( 'nuttery', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_theme_load_theme_textdomain' );


add_filter('body_class','add_onas_to_single');
function add_onas_to_single($classes) {
    if (is_product() ) {
        
            $classes[] = 'onas';
	    $classes[] = 'produkt';
        }
    
    // return the $classes array
    return $classes;
}


function gp_remove_cpt_slugs( $post_link, $post ) {
  if ( 'portfolio' === $post->post_type && 'publish' === $post->post_status ) {
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
  }
  return $post_link;
}
//add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 2 );



/**
 * @snippet       Display "Quantity: #" @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.6.2
 */
  
add_filter( 'woocommerce_get_availability_text', 'bbloomer_custom_get_availability_text_single', 99, 2 );
  
function bbloomer_custom_get_availability_text_single( $availability, $product ) {
  $stock = $product->get_stock_quantity();
  if ( $product->is_in_stock() && $product->managing_stock() && $product->is_type( 'simple' ) ) {


    $pair = __( 'Zostávajú posledné ', 'nuttery' ) . '<span>' . $stock . '</span>' .  __( ' kusy na sklade', 'nuttery' );

   if ($stock > 5) {
     $availability = __( $stock . '&nbsp;na sklade', 'nuttery' );
   } else if ($stock == 4) {
      $availability = $pair;
   } else if ($stock == 3) {
      $availability = $pair;
   } else if ($stock == 2) {
      $availability = $pair;
   } else if ($stock == 1) {
      $availability = __( 'Zostáva posledný ', 'nuttery' ) . '<span>' . $stock . '</span>' . __( ' kus na sklade', 'nuttery' );
   } else if ($stock == 0) {
      $availability = __( 'Vypredané', 'nuttery' );
   }


  }

   
  return $availability;
}


add_filter( 'body_class', 'product_category_slug_to_body_class', 99, 1 );
function product_category_slug_to_body_class( $classes ){
    if( is_product_category() || is_shop()){
        $classes[] = "blog";
    }
    return $classes;
}





add_filter('woocommerce_package_rates','modify_shipping_price',100,2);
function modify_shipping_price($rates,$package) {

 $cartSubtotal = WC()->cart->subtotal;

  
 



if ( $cartSubtotal >= FREE_SHIPPING_NUTTERY_KURIER) {
 
  



     foreach($rates as $rate_key => $rate_values ) {




 


        if (($rate_key == "flat_rate:1") && get_field( 'dorucenie_domov_zadarmo', 'options' )) {

          // Set the discounted rate cost
          $rates[$rate_key]->cost = 0;


          // Taxes rate cost (if enabled)
          $taxes = array();
          foreach ($rates[$rate_key]->taxes as $key => $tax){
              if( $tax > 0 ){ // set the new tax cost
                  // set the new line tax cost in the taxes array
                  $taxes[$key] = 0;
              }
          }
          // Set the new taxes costs
          $rates[$rate_key]->taxes = $taxes;


       }
    }
    

  }



  return $rates;





}




/**
 * @snippet       Add Custom Field @ WooCommerce Checkout Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_action( 'woocommerce_before_order_notes', 'bbloomer_add_custom_checkout_field' );
  
function bbloomer_add_custom_checkout_field( $checkout ) { 


  
   woocommerce_form_field( 'odberne_miesto', array(        
      'type' => 'text',        
      'class' => array( 'form-row-wide d-none' ),        
      'label' => 'Odberné miesto',        
           
      'required' => false,        
      
   ), $checkout->get_value( 'odberne_miesto' ) ); 
}




add_action( 'woocommerce_checkout_update_order_meta', 'bbloomer_save_new_checkout_field' );
  
function bbloomer_save_new_checkout_field( $order_id ) { 
    if ( !empty($_POST['odberne_miesto']) ) {
      update_post_meta( $order_id, '_odberne_miesto', esc_attr( $_POST['odberne_miesto'] ) );
    }
}