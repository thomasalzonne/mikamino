<div class="dbtC">
    <div class="wi90 ma grid12">
        <?php if(get_sub_field('left_text')): ?>
            <?php while(have_rows('left_text')): the_row() ?>
                <div class="dbttl">
                    <div class="btititle"><?= get_sub_field('title') ?></div>
                    <div class="btidesc"><?= get_sub_field('texte') ?></div>
                    <div class="dbttlbtnC">
                        <?php if(get_sub_field('btn_link') && get_sub_field('btn_text')): ?>
                            <a class="dbttlbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif ?>
        <?php if(get_sub_field('right_text')): ?>
            <?php while(have_rows('right_text')): the_row() ?>
                <div class="dbttr">
                    <div class="btititle"><?= get_sub_field('title') ?></div>
                    <div class="btidesc"><?= get_sub_field('texte') ?></div>
                    <div class="dbttrbtnC">
                        <?php if(get_sub_field('btn_link') && get_sub_field('btn_text')): ?>
                            <a class="dbttrbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif ?>
    </div>
</div>