<div class="products">
    <div class="grid12 wi90 ma">
        <div class="producttext">
            <div class="df m50">
                <div class="producttitle"> <?= get_sub_field('title') ?></div>
                <a class="btn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
            </div>
            <div class="description">
                <?= get_sub_field('description') ?>
            </div>
        </div>
        <?php if (get_sub_field('1or2') == "two"): ?>
            <div class="imgC grid8">
                <?php if(have_rows('first_product')): ?>
                    <?php while(have_rows('first_product')): the_row()?>
                        <a class="img1 rellax" data-rellax-speed="-2" href="<?= get_sub_field('product_link') ?>">
                            <img src="<?= get_sub_field('product_image') ?>" alt="">
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if(have_rows('second_product')): ?>
                    <?php while(have_rows('second_product')): the_row()?>
                        <a class="img2 rellax" data-rellax-speed="3" href="<?= get_sub_field('product_link') ?>">
                            <img src="<?= get_sub_field('product_image')['url'] ?>" alt="">
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    if(screen.width < 801){
        var img1 = document.querySelector('.img1')
        $(img1).attr('data-rellax-speed' , '0.2')
        var img2 = document.querySelector('.img2')
        $(img2).attr('data-rellax-speed' , '-0.2')
    }
</script>
