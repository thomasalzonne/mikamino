<?php
require 'vendor/autoload.php';
use SellsyApi\Client;

define('THEME_TEXT_DOMAIN', '');
function include_backend($filename)
{
    include get_template_directory() . "/backend/$filename.php";
}

$files = [
  'utils',
  'base',
  'back_office',
  'menu',
  'acf',
];

foreach ($files as $file) {
    include_backend($file);
}
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
	));
  acf_add_options_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
	));
}
function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// add_action( 'woocommerce_after_shop_loop_item_title', 'mashvp__blabla', 10 );
// function mashvp__blabla() {
//   echo '<h2>TEST</h2>';
// }

add_filter('woocommerce_get_availability_text', 'themeprefix_change_soldout', 10, 2 );
function themeprefix_change_soldout ( $text, $product) {
if ( !$product->is_in_stock() ) {
$text = '<p class="stock out-of-stock">Rupture</p>';
}
return $text;
}

// For all products except variable product
add_filter( 'woocommerce_product_single_add_to_cart_text', 'product_single_add_to_cart_text_filter_callback', 20, 2 );
function product_single_add_to_cart_text_filter_callback( $button_text, $product ) {
    if( ! $product->is_in_stock() && ! $product->is_type('variable') ) {
        $button_text = __("Rupture de stock", "woocommerce");
    }
    return $button_text;
}

// For all product variations (on a variable product)
add_action( 'woocommerce_after_add_to_cart_button', 'after_add_to_cart_button_action_callback', 0 );
function after_add_to_cart_button_action_callback() {
    global $product;

    if( $product->is_type('variable') ) :

    $data = [];

    // Loop through variation Ids
    foreach( $product->get_visible_children() as $variation_id ){
        $variation = wc_get_product( $variation_id );
        $data[$variation_id] = $variation->is_in_stock();
    }

    $outofstock_text = __("Rupture de stock", "woocommerce");
    ?>
    <script type="text/javascript">
    jQuery(function($){
        var b = 'button.single_add_to_cart_button',
            t = $(b).text();

        $('form.variations_form').on('show_variation hide_variation found_variation', function(){
            $.each(<?php echo json_encode($data); ?>, function(j, r){
                var i = $('input[name="variation_id"]').val();
                if(j == i && i != 0 && !r ) {
                    $(b).html('<?php echo $outofstock_text; ?>');
                    $(b).css('background-color', '#979797')
                    return false;
                } else {
                    $(b).html(t);
                }
            });
        });
    });
    </script>
    <?php
    endif;
}

	
// add_action('woocommerce_new_order', function ($order_id) {
//     $userToken = '216bbd3bd1ea06a408083ac464746c86eb2cd5c7';
//     $userSecret = 'c2db9dbc132e885afdcbb14e5cd0e20e7c233411';
//     $consumerKey = '3b946aebe219c9423dd575a6baed2448bc35cbf0';
//     $consumerSecret = '1115687d3ef59e73a2af09fcc36a6cd59bea9f18';
//     $client = new Client(['userToken'      => $userToken, 'userSecret'     => $userSecret,
//                         'consumerToken'  => $consumerKey, 'consumerSecret' => $consumerSecret,
//                         ]);
//     $service = $client->getService('Document');
//     $request = $service->call('create', ['document' => ['doctype' => 'invoice','thirdid' => get_current_user_id()],
//     'row' => [ 
//         '1' => ['row_packaging' => "testorders"],
//         '2' => ['row_shipping' => 'DHL'], '3' => ['row_unit' => 'KG', 'row_unitAmount' => "2", 'row_purchaseAmount' => "1", 'row_taxid' => 1],
//         '7' => ['row_comment' => 'test commentaire'], '6' => ['row_title' => 'TEST TITRE']]
//     ]);
// }, 10, 1);
//fonctionne pour créer un produit
add_action( 'added_post_meta', 'plugin_name_sync_on_product_save', 10, 4 );
add_action( 'updated_post_meta', 'plugin_name_sync_on_product_save', 10, 4 );
function plugin_name_sync_on_product_save( $meta_id, $post_id, $meta_key, $meta_value ) {
    if ( $meta_key == '_edit_lock' ) { // we've been editing the post
        if ( get_post_type( $post_id ) == 'product' ) { // we've been editing a product
            $userToken = '216bbd3bd1ea06a408083ac464746c86eb2cd5c7';
            $userSecret = 'c2db9dbc132e885afdcbb14e5cd0e20e7c233411';
            $consumerKey = '3b946aebe219c9423dd575a6baed2448bc35cbf0';
            $consumerSecret = '1115687d3ef59e73a2af09fcc36a6cd59bea9f18';
            $client = new Client(['userToken'      => $userToken, 'userSecret'     => $userSecret,
                                'consumerToken'  => $consumerKey, 'consumerSecret' => $consumerSecret,
                                ]);
            $service = $client->getService('Catalogue');
                $product = wc_get_product( $post_id );
                $service->call('create', ['type' => 'item', 'item' => [ 'id' => $post_id, 'name' => $product->get_title(), 'tradename' => $product->get_title(), 'unit' => 'unité', 'taxrate' => 20, 'purchaseAmount' => $product->get_price(),'unitAmount' => $product->get_price()]]);
        }
    }
}