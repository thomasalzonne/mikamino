<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<div class="mainnav grid animnav boutique">
    <?= wp_nav_menu('mainnav') ?>
    <div class="logoC" onclick="window.location.href = '/'">
        <img class="logoboutique" src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/assets/img/logob.png"  alt="" >
    </div>
    <div class="profil">
        <div class="profilcontainer">
            <div class="compte" onclick="window.location.href = '/mon-compte'">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="panier" onclick="window.location.href = '/panier'">
                Panier
                <div class="itemincart">
                    <?= $woocommerce->cart->cart_contents_count; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobnav grid2">
    <a href="javascript:void(0);" onclick="myFunction()" class="btnmobmenu">Menu</a>
    <div class="profilmob">
        <div class="profilcontainermob">
            <div class="comptemob" onclick="window.location.href = '/mon-compte'">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="paniermob" onclick="window.location.href = '/panier'">
                Panier
                <div class="itemincart">
                    <?= $woocommerce->cart->cart_contents_count; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="myLinks">
        <?= wp_nav_menu('mainnav') ?>
    </div>

</div>
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<script>
var imgs = document.querySelectorAll('.woocommerce-product-gallery__image img')
Array.from(imgs).map(el => {
    var size = el.width
    el.style.height = size +"px"
    el.removeAttribute("sizes")
})
const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.tabTarget)
    tabContents.forEach(tabContent => {
      tabContent.classList.remove('active')
    })
    tabs.forEach(tab => {
      tab.classList.remove('active')
    })
    tab.classList.add('active')
    target.classList.add('active')
  })
})
</script>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
