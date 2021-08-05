<?php /* Template Name: Actu */ ?>
<?php get_header() ?>
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
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
$args = array(
        'posts_per_page' => 7,
        'paged' => $paged
);
$custom_query = new WP_Query( $args );
?>
    <?php if(get_posts()): ?>
        <div class="newC pt100">
            <div class="newarticle grid12 wi90 ma">
                <?php woocommerce_breadcrumb(); ?>
                <div class="actutitle">Actualités</div>
                <?php $post = get_posts($args)[0]?>
                <div class="mainactu grid9">
                    <div class="mainactuimg" style="background-image: url('<?= get_field('image')['url'] ?>')"></div>
                    <div class="mainpostcontainer">
                        <div class="mainarticletitle">
                            <?= $post->post_title ?>
                        </div>
                        <div class="mainarticlecateg">
                            <?= get_the_date() ?>
                        </div>
                        <div class="mainpostdesc">
                            <?= $post->post_excerpt ?>
                        </div>
                        <div class="mainbottom">
                            <a href="<?= $post->guid ?>" class="main btn wfc mt20">Voir plus</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="actuC mt60">
            <div class="postgrid grid12 wi90 ma">
            <?php
                $a = count(get_posts($args));
                for ($i = 1; $i < $a; $i++):
            ?>
                <?php $post = get_posts($args)[$i]?>
                    <div class="postcard grid6">
                    <div class="actuimg" style="background-image: url('<?= get_field('image')['url'] ?>')"></div>
                        <div class="postcontainer">
                            <div class="articletitle">
                                <?= $post->post_title ?>
                            </div>
                            <div class="articlecateg">
                                <?= get_the_date() ?>
                            </div>
                            <div class="postdesc">
                                <?= $post->post_excerpt ?>
                            </div>
                            <div class="bottom">
                                <a href="<?= $post->guid ?>" class="btn wfc mt20">Voir plus</a>
                            </div>
                        </div>
                    </div>            
                <?php endfor; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="pagination">
        <?=
    paginate_links(array(
        'total' => $custom_query->max_num_pages,
        'mid_size' => 3
    ))
    ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var btn = document.querySelector('#loadmore')
    $(btn).click(function(){
        var a = document.querySelectorAll(".none")
        if(a.length >= 2){
            $(a[0]).removeClass('none')
            $(a[1]).removeClass('none')
            var a = document.querySelectorAll(".none")
            if(a.length === 0){
                $(btn).addClass('none')
            }
        }
        else{
            $(a[0]).removeClass('none')
            $(btn).addClass('none')
        }
    })
</script>
<style>
    main {
        background-color: #FBF8E8;
    }
</style>
<?php get_footer() ?>