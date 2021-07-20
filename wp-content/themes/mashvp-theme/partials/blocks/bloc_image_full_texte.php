<div class="iftC" style="background-image: url('<?= get_sub_field('image')['url'] ?>')">
    <div class="grid12 wi90 ma ift nogrg">
        <div class="ifttitle"><?= get_sub_field('title') ?></div>
        <div class="ifttext"><?= get_sub_field('texte') ?></div>
        <?php if(have_rows('btn')): ?>
            <?php while(have_rows('btn')): the_row() ?>
            <a href="<?= get_sub_field('btn_link') ?>" class="iftbtn"><?= get_sub_field('btn_text') ?></a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>