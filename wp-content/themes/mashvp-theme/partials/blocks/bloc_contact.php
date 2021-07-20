<?php
    $formulaire = get_sub_field('formulaire')
?>
<div class="contactC">
    <div class="grid12 wi90 ma mt100 contact pb80">
        <?php woocommerce_breadcrumb(); ?>
        <div class="contacttitle"><?= get_sub_field('title') ?></div>
        <div class="contacttext">
            <div class="contactord"><?= get_sub_field('lil_txt') ?></div>
            <div class="contactmail"><?= get_sub_field('mail') ?></div>
        </div>
        <div class="contactform">
            <?php echo do_shortcode($formulaire) ?>
        </div>
        <div class="contactimg" style="background-image: url('<?= get_sub_field('image')['url'] ?>')"></div>
    </div>
</div>
<script>
    var img = document.querySelector('.contactimg')
    var size = img.offsetWidth
    img.style.height = size+"px"

    var msg = document.querySelector('.contactmsg')
    var msgpar = $(msg).parent()
    $(msgpar).css("grid-column","span 6")

    var checkbox = document.querySelector('.contactcheckbox')
    var chepar = $(checkbox).parent()
    $(chepar).css("grid-column","1")
    $(chepar).css("grid-row","1")
    
    var msgtxt = document.querySelector('.contactmsgtxt')
    var msgtxtpar = $(msgtxt).parent()
    $(msgtxtpar).css("grid-column","1/span 3")
    $(msgtxtpar).css("grid-row","1")
    $(msgtxtpar).css("margin-left","20px")
    if($(window).width() < 451){
        $(msgtxtpar).css("margin-top","-35px")
    }

    var ctbtn = document.querySelector('.contactbtn')
    var ctbtnpar = $(ctbtn).parent()
    $(ctbtnpar).css("grid-column","5/span 2")
    $(ctbtnpar).css("display","flex")
    
    var msgsend = document.querySelector('.msgsend')
    var msgsendpar = $(msgsend).parent()
    $(msgsendpar).css("grid-column","3/span 4 !important")
    
</script>