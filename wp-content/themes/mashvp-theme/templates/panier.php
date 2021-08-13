<?php /* Template Name: Panier */ ?>
<?php get_header() ?>
<?= mashvp_do_blocks('header-content-shop') ?>
<div class="mainnav grid animnav boutique">
    <?= wp_nav_menu('mainnav') ?>
    <div class="logoC" onclick="window.location.href = '/mikamino'">
        <img class="logoboutique" src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/assets/img/logob.png"  alt="" >
    </div>
    <div class="profil">
        <div class="profilcontainer">
            <div class="compte" onclick="window.location.href = '/mikamino/mon-compte'">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="panier" onclick="window.location.href = '/mikamino/panier'">
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
            <div class="comptemob" onclick="window.location.href = '/mikamino/mon-compte'">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="paniermob" onclick="window.location.href = '/mikamino/panier'">
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
<div class="panierC">
    <?php woocommerce_breadcrumb(); ?>
    <div class="paniertitle">Panier</div>
    <?php the_content() ?>
</div>

<?php get_footer() ?>
<style>
    body{
        background-color: #FBF8E8;
    }
</style>