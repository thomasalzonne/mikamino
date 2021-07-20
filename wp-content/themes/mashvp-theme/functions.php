<?php

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