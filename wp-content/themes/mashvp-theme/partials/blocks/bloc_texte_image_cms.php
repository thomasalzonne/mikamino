<div class="btiC">
    <div class="wi90 ma grid12">
        <div class="bti">
            <?php if(get_sub_field('texte')): ?>
                <?php while(have_rows('texte')): the_row() ?>
                    <div class="btitext">
                        <div class="btititle"><?= get_sub_field('title') ?></div>
                        <div class="btidesc"><?= get_sub_field('texte') ?></div>
                        <div class="btibtnC">
                            <a class="btibtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif ?>
            <div class="btiimg" style="background-image: url('<?= get_sub_field('picture') ?>')"></div>
        </div>
    </div>
</div>