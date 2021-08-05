<?php $title = get_sub_field('title') ?>
<div class="reviews">
    <div class="grid12 wi90 ma pt440 pb120">
        <?php if(have_rows('reviews')): ?>
            <div class="grid12 full h80 mb30">
                <div class="reviewstitle"><?= $title ?></div>
                <div class="arrow">
                    <span class="arrowleftz" id="prev">Précédent</span>
                    <span class="arrowrightz" id="next">Suivant</span>
                </div>
            </div>
            <div class="thumbnailgallerie">
                <div class="showroom clearfix">
                    <?php while(have_rows('reviews')): the_row() ?>
                        <div class="review grid6">
                            <div class="reviewcontainer">
                                <div class="ppl">
                                    <?= get_sub_field('name') ?>, <?= get_sub_field('age') ?>
                                </div>
                                <div class="textreview">
                                    <?= get_sub_field('review') ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    if($(window).width() > 800) {
        event = document.querySelectorAll(".review");
        for (let i = 0; i < event.length/2; i++) {
            $('<div class="toslide grid12"></div>').appendTo('.showroom');
        }
        divevent = document.querySelectorAll(".toslide");

        for (let i = 0; i < event.length; i++) {
            for (let a = 0; a < $(divevent).length; a++) {
                if ($(divevent[a]).children().length <=1) {
                    divevent[a].appendChild(event[i])
                }                
            }
        }
        $('#prev').on('click', function () {
        var last = $('.toslide').last().css({opacity: '0'});
        last.prependTo('.showroom');
        last.animate({opacity: '1', gridColumn: 'span 12'});
        });
        $('#next').on('click', function () {
            var first = $('.toslide').first();
            first.animate({opacity: '0'}, function() {
                first.appendTo('.showroom').css({opacity: '1', gridColumn: 'span 12'});
            });
        });
    }else{
        $('#prev').on('click', function () {
        var last = $('.review').last().css({opacity: '0'});
        last.prependTo('.showroom');
        last.animate({opacity: '1', gridColumn: 'span 12'});
        });
        $('#next').on('click', function () {
            var first = $('.review').first();
            first.animate({opacity: '0'}, function() {
                first.appendTo('.showroom').css({opacity: '1', gridColumn: 'span 12'});
            });
        });
    }
</script>