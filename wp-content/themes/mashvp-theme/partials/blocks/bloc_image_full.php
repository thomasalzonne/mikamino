<?php
$bool = get_sub_field('isvideo');
?>
<?php if($bool == 1): ?>
    <?php
        $video = get_sub_field('video');
    ?>
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    <div class="headerhp">
    <video
    id="myVideo"
    class="video-js"
    preload="auto"
    autoplay="true"
    playsinline
    muted
    loop
    data-setup="{}"
    >
        <source src="<?= $video ?>" type="video/mp4">
    </video>
<?php else: ?>
    <div class="imgfullC" style="background-image: url('<?= get_sub_field('image')['url'] ?>')"></div>
<?php endif; ?>