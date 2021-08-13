<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$values = wc_get_product_terms( $product->id, 'pa_color', array( 'fields' =>  'all' ) );
$colors = [];
if( $values ){
		foreach ( $values as $term ){
			$colors[$term->name] = term_description( $term->term_id, $term->taxonomy );
		}
}
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="produitC">
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

		<?php
		$attachment_ids = $product->get_gallery_image_ids();

		if ( is_array( $attachment_ids ) && !empty($attachment_ids) ) {
			$first_image_url = wp_get_attachment_url( $attachment_ids[0] );
			// ... then do whatever you need to do
		} // No images found
		else {
			// @TODO
		}
		?>
		<?php woocommerce_breadcrumb(); ?>
		
		<?= $product->get_image('full', ['class' => 'mainpicture']) ?>

		<div class="big100">
			<div class="productdesc grid12 wi90 ma">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				?>
				<?php if(have_rows('bloc-info')): ?>
					<div class="producttabs">
						<ul class="tabs">
							<?php $a =0; $b =0; ?>
							<?php while(have_rows('bloc-info')): the_row()?>
								<?php if($a == 0): ?>
									<li data-tab-target="#<?= get_sub_field('id') ?>" class="tab active"><?= get_sub_field('title') ?></li>
								<?php else: ?>
									<li data-tab-target="#<?= get_sub_field('id') ?>" class="tab"><?= get_sub_field('title') ?></li>
								<?php endif; ?>
								<?php $a++ ?>
							<?php endwhile; ?>
						</ul>
						<div class="tab-content">
							<?php while(have_rows('bloc-info')): the_row()?>
								<?php if($b == 0): ?>
									<div id="<?= get_sub_field('id') ?>" data-tab-content class="active"><?= get_sub_field('texte') ?></div>
								<?php else: ?>
									<div id="<?= get_sub_field('id') ?>" data-tab-content><?= get_sub_field('texte') ?></div>
								<?php endif; ?>
								<?php $b++ ?>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="summary entry-summary grid4">
			<?php if(get_field('icone')): ?>
				<img class="prodicon" src="<?= get_field('icone')['url'] ?>">
			<?php endif; ?>
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>
	
	</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>

<script>
	
	(function($) {
		var colors = <?php echo json_encode($colors); ?>;
		for(var key in colors) {
			if(colors[key]){
				colors[key] = colors[key].split('<p>')[1];
				colors[key] = colors[key].split('</p>')[0]
			}
		}
		document.addEventListener('DOMContentLoaded', function() {
			const els = $('form.variations_form select');

			$(document.body).on('woocommerce_update_variation_values', function(variation) {
				els.each(function() {
					const choices = new Choices($(this)[0], {
						callbackOnCreateTemplates: function(template) {
							return {
							item: (classNames, data) => {
								color = colors[data.label]
								return template(`
								<div class="${classNames.item} ${
								data.highlighted
									? classNames.highlightedState
									: classNames.itemSelectable
								} ${
								data.placeholder ? classNames.placeholder : ''
								}" data-item data-id="${data.id}" data-value="${data.value}" ${
								data.active ? 'aria-selected="true"' : ''
								} ${data.disabled ? 'aria-disabled="true"' : ''} style="padding-right: 0px !important">
									<span class="colorselect" style="background-color: ${color}"></span> <p class="infoselec">${data.label}</p>
								</div>
								`);
							},
							choice: (classNames, data) => {
								color = colors[data.label]
								return template(`
								<div class="${classNames.item} ${classNames.itemChoice} ${
								data.disabled ? classNames.itemDisabled : classNames.itemSelectable
								}" data-select-text="${this.config.itemSelectText}" data-choice ${
								data.disabled
									? 'data-choice-disabled aria-disabled="true"'
									: 'data-choice-selectable'
								} data-id="${data.id}" data-value="${data.value}" ${
								data.groupId > 0 ? 'role="treeitem"' : 'role="option"'
								} style="padding-right: 0px !important">
								
									<span class="colorselect" style="background-color: ${color}"></span> <p class="infoselec">${data.label}</p>
								</div>
								`);
							},
							};
						}
					});
				});
			});
		});
	})(jQuery);
</script>