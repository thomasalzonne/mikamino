<?php
global $woocommerce;
?>
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
<?php if(get_sub_field('picture')): ?>
    <div class="headerboutique" style="background-image: url('<?= get_sub_field('picture') ?>')">
        <div class="wi90 grid12 mxauto hfull mta">
            <?php woocommerce_breadcrumb(); ?>
            <div class="boutiquetitle">
                <?= get_sub_field('title') ?>
            </div>
        </div>
    </div>
    <div class="wi90 grid12 mxauto">
        <div class="boutiquetext">
            <?= get_sub_field('texte') ?>
        </div>
        <div class="scrollbot">
            <?php include  get_template_directory() . "/assets/img/scroll.svg" ?>
        </div>
    </div>
<?php endif; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>
<style>
    main {
    background-color: #FBF8E8;
    }
</style>