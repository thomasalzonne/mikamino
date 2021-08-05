<div class="psC">
    <div class="grid12 wi90 ma nogrg">
        <?php woocommerce_breadcrumb(); ?>
       <div class="pstitle"><?= get_sub_field('title') ?></div> 
       <div class="grid10">
           <?php if(have_rows('bloc_de_texte')): ?>
                <?php while(have_rows('bloc_de_texte')): the_row() ?>
                <div class="psbt">
                    <div class="psbttitle"><?= get_sub_field('title') ?></div>
                    <div class="psbtdesc"><?= get_sub_field('texte') ?></div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
       </div>
    </div>
</div>