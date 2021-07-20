<div class="valeurs">
    <div class="grid12 wi90 ma val nogrg">
        <div class="valeurstitle"><?= get_sub_field('title') ?></div>
        <?php if(have_rows('valeur_1')): ?>
            <?php while(have_rows('valeur_1')): the_row() ?>
                <div class="valeur v1 rellax" data-rellax-speed="-0.5" style="background-image: url('<?= get_sub_field('image') ?>')">
                </div>
                <div class="valeurtextcontainer e1">
                    <div class="valeurtextcontent">
                        <div class="valeurtitle"><?= get_sub_field('img_title') ?></div>
                        <div class="valeurtext"><?= get_sub_field('img_text') ?></div>
                        <a class="valeurbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if(have_rows('valeur_2')): ?>
            <?php while(have_rows('valeur_2')): the_row() ?>
                <div class="valeur v2 rellax" data-rellax-speed="-1" style="background-image: url('<?= get_sub_field('image') ?>')">
                </div>
                <div class="valeurtextcontainer e2">
                    <div class="valeurtextcontent">
                        <div class="valeurtitle"><?= get_sub_field('img_title') ?></div>
                        <div class="valeurtext"><?= get_sub_field('img_text') ?></div>
                        <a class="valeurbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if(have_rows('valeur_3')): ?>
            <?php while(have_rows('valeur_3')): the_row() ?>
                <div class="valeur v3 rellax" data-rellax-speed="-1.5" style="background-image: url('<?= get_sub_field('image')['url'] ?>')">
                    
                </div>
                <div class="valeurtextcontainer e3">
                    <div class="valeurtextcontent">
                        <div class="valeurtitle"><?= get_sub_field('img_title') ?></div>
                        <div class="valeurtext"><?= get_sub_field('img_text') ?></div>
                        <a class="valeurbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js" integrity="sha512-f5HTYZYTDZelxS7LEQYv8ppMHTZ6JJWglzeQmr0CVTS70vJgaJiIO15ALqI7bhsracojbXkezUIL+35UXwwGrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    if(screen.width > 800){
        var e1 = document.querySelector('.valeurtextcontainer.e1')
        var v1 = document.querySelector('.valeur.v1')
        var e2 = document.querySelector('.valeurtextcontainer.e2')
        var v2 = document.querySelector('.valeur.v2')
        var e3 = document.querySelector('.valeurtextcontainer.e3')
        var v3 = document.querySelector('.valeur.v3')
        $(e1).appendTo(v1)
        $(e2).appendTo(v2)
        $(e3).appendTo(v3)
    }
    else{
        var v1 = document.querySelector('.valeur.v1')
        var v2 = document.querySelector('.valeur.v2')
        var v3 = document.querySelector('.valeur.v3')
        $(v1).removeClass('rellax')
        $(v2).removeClass('rellax')
        $(v3).removeClass('rellax')
    }
    var rellax = new Rellax('.rellax');
</script>