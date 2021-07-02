<?php
$images = get_sub_field('images');
?>
<div class="insta">
    <div class="grid12 wi90 ma pt100">
        <div class="logoinsta">
            <div class="loginsta"></div>
        </div>
        <div class="instatitle">
            <?= get_sub_field('title') ?>
        </div>
        <div class="gallery grid12 pb100">
            <?php foreach( $images as $image ): ?>
                <img src="<?= $image ?>" class="instaimg">
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    var images = document.querySelectorAll('.instaimg')
    Array.from(images).map(el => {
        var size = $(el).width()
        el.style.height = size + "px"
    })
</script>