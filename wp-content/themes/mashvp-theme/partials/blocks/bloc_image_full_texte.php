<div class="iftC" style="background-image: url('<?= get_sub_field('image')['url'] ?>')">
    <div class="grid12 wi90 ma ift nogrg">
        <div class="ifttitle" style='color: <?= get_sub_field('color') ?>'><?= get_sub_field('title') ?></div>
        <div class="ifttext" style='color: <?= get_sub_field('color') ?>'><?= get_sub_field('texte') ?></div>
        <?php if(have_rows('btn')): ?>
            <?php while(have_rows('btn')): the_row() ?>
                <?php if(get_sub_field('btn_link') && get_sub_field('btn_text')): ?>
                    <a href="<?= get_sub_field('btn_link') ?>" class="iftbtn"><?= get_sub_field('btn_text') ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>