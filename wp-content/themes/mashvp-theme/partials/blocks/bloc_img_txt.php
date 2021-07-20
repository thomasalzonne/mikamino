<div class="imgtxtC">
    <div class="grid12 wi90 ma imgtxt">
        <?php if(get_sub_field('sens') == "ltr"): ?>
            <div class="imgtxtimg ltr" style="background-image: url('<?= get_sub_field('image')['url'] ?>')"></div>
            <?php if(have_rows('texte')): ?>
                <div class="imgtxttxt ltr">
                    <?php while(have_rows('texte')): the_row()?>
                        <div class="iattitle"><?= get_sub_field('title') ?></div>
                        <div class="iattext"><?= get_sub_field('texte') ?></div>
                        <?php if(get_sub_field('btn') == 1 ): ?>
                            <a class="marquebtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(get_sub_field('sens') == "rtl"): ?>
            <div class="imgtxtimg rtl" style="background-image: url('<?= get_sub_field('image')['url'] ?>')"></div>
            <?php if(have_rows('texte')): ?>
                <div class="imgtxttxt rtl">
                    <?php while(have_rows('texte')): the_row()?>
                        <div class="iattitle"><?= get_sub_field('title') ?></div>
                        <div class="iattext"><?= get_sub_field('texte') ?></div>
                        <?php if(get_sub_field('btn') == 1 ): ?>
                            <a class="marquebtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>