<div class="aventagesC">
    <div class="wi90 grid12 ma">
        <div class="avtitle"><?= get_sub_field('title') ?></div>
        <?php if(have_rows('avantage')): ?>
            <div class="avantages">
                <?php while(have_rows('avantage')): the_row() ?>
                <div class="avantage">
                    <div class="avicon" style="background-image: url('<?= get_sub_field('icone') ?>')"></div>
                    <div class="avtitle tacenter"><?= get_sub_field('description') ?></div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>