<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
if( $product->is_on_sale() ) {
	?>
	<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> new"><?php echo $product->get_price(); ?>€</p><p class='oldprice <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>'><?= $product->get_regular_price();?>€<p>
<?php
}else{
	?>
	<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price(); ?>€</p>
	<?php
}
?>
<script>
	var oldp = document.querySelector('p.oldprice.price')
	var psize = document.querySelector('p.price.new')
	var ml = psize.offsetWidth + 25
	oldp.style.marginLeft = ml +'px'
</script>
