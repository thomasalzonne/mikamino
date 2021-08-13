<div class="btbC">
    <div class="grid12 wi90 ma nogrg">
        <div class="btbtitle"><?= get_sub_field('title') ?></div>
        <div class="btbtext"><?= get_sub_field('texte') ?></div>
        <?php if(have_rows('btn')): ?>
            <?php while(have_rows('btn')): the_row() ?>
                <?php if(get_sub_field('btn_link') && get_sub_field('btn_text')): ?>
                    <a href="<?= get_sub_field('btn_link') ?>" class="btbbtn"><?= get_sub_field('btn_text') ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>