<div class="bdtC">
    <div class="grid12 wi90 ma bdt nogrg">
        <div class="bdttitle"><?= get_sub_field('title') ?></div>
        <div class="bdtlefttxt"><?= get_sub_field('left_text') ?></div>
        <div class="bdtrighttxt"><?= get_sub_field('right_text') ?></div>
        <?php if(have_rows('bouton')): ?>
            <?php while(have_rows('bouton')): the_row() ?>
                <?php if(get_sub_field('btn_link') && get_sub_field('btn_text')): ?>
                    <a class="bdtbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>