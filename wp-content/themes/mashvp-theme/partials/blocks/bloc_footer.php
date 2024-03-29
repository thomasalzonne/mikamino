<div class="footer">
    <?php if(have_rows('experience_mikamino')): ?>
        <?php while(have_rows('experience_mikamino')): the_row() ?>
        <div class="expmikaC">
            <div class="expmika grid12 wi90 ma">
                <?php if(have_rows('partie_haute')): ?>
                    <?php while(have_rows('partie_haute')): the_row() ?>
                        <div class="ph grid12nogrg full">
                            <div class="phtitle"><?= get_sub_field('title') ?></div>
                            <div class="phdesc"><?= get_sub_field('description') ?></div>
                            <div class="phbtnC">
                                <a class="phbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="spacer"></div>
                <?php if(have_rows('partie_basse')): ?>
                    <?php while(have_rows('partie_basse')): the_row() ?>
                        <div class="pb grid12 full pb70">
                            <?php if(have_rows('le_point')): ?>
                                <?php while(have_rows('le_point')): the_row() ?>
                                    <div class="point grid3">
                                        <div class="explogo">
                                            <img class ="explogoimg" src="<?= get_sub_field('img') ?>" alt="">
                                        </div>
                                        <div class="exptext">
                                            <div class="exptitle"><?= get_sub_field('title') ?></div>
                                            <div class="expsbtitle"><?= get_sub_field('subtitle') ?></div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if(have_rows('bottom')): ?>
        <?php while(have_rows('bottom')): the_row() ?>
            <div class="bottomfooterC">
                <div class="bottomfooter grid12grg80 wi90 ma pt80 pb60">
                    <div class="rslogoC grid6">
                        <?php if(have_rows('social-network')): ?>
                            <div class="rsC grid2">
                                <?php while(have_rows('social-network')): the_row() ?>
                                    <?php if(get_sub_field('link') && get_sub_field('img')): ?>
                                        <a class="rsbtn" href="<?= get_sub_field('link') ?>">
                                            <img src="<?= get_sub_field('img')['url'] ?>" alt="">
                                        </a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <img class="footerlogo" src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/assets/img/logo.png"  alt="" >
                    </div>
                    <div class="newsletter">
                        <?= do_shortcode('[sibwp_form id=2]')?>
                    </div>
                    <?php if(have_rows('footer-menu')): ?>
                        <div class="legals grid6nogrg">
                            <?php while(have_rows('footer-menu')): the_row() ?>
                                <div class="legal">
                                    <a href="<?= get_sub_field('link') ?>"><?= get_sub_field('texte') ?></a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mashvp">Site by Mashvp 🌱</div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<script>
    var rsbtn = document.querySelectorAll('.rsbtn')
    Array.from(rsbtn).map(el =>{
        var size = $(el).width()
        el.style.height = size + "px"
    })
    if(screen.width < 801){
        var points = document.querySelectorAll('.explogo')
        Array.from(points).map(el =>{
            var size = $(el).width()
            el.style.height = size + "px"
        })
    }
    function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    var submenus = document.querySelectorAll('.submenu')
    Array.from(submenus).map(el => {
        el.addEventListener('mouseenter', e => {
            $(el).children('a').css('background-color', 'white')
            $(el).children('a').css('border-radius', '50px')
            $(el).find('.sub-menu').css('display', 'block')
        })
        el.addEventListener('mouseleave', e => {
            $(el).children('a').css('background-color', 'unset')
            $(el).children('a').css('border-radius', 'unset')
            $(el).find('.sub-menu').css('display','none')
        })
    })
</script>