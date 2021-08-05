<?php $a = 0; ?>
<div class="conseilsC">
    <div class="wi90 grid12 ma">
        <div class="conseilstitle"><?= get_sub_field('title') ?></div>
        <div class="conseilsdesc"><?= get_sub_field('texte') ?></div>
        <?php if(get_sub_field('tip')): ?>
            <div class="conseils">
                <?php while(have_rows('tip')): the_row() ?>
                <?php $a++ ?>
                <div class="conseil">
                    <div class="conseilvisible">
                        <div class="conseiltitle"><?= get_sub_field('title') ?></div>
                        <button class="dropdown drop<?= $a ?>" onclick="showcontent(<?= $a ?>)"></button>
                    </div>
                    <div class="conseilC conseil<?= $a ?>" style="height: 0; opacity: 0;margin-top: 0px">
                        <div class="testheight">
                            <div class="conseildesc"><?= get_sub_field('description') ?></div>
                            <div class="conseilbtnC">
                                <a href="<?= get_sub_field('btn_link') ?>" class="conseilbtn"><?= get_sub_field('btn_text') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<script>
    function showcontent(event){
        var btn = document.querySelector('.drop'+event)
        var el = document.querySelector('.conseilC.conseil'+event)
        var height = document.querySelector('.conseilC.conseil'+event+' .testheight')
        if(el.style.opacity === "0"){
            btn.style.transform = "rotateZ(180deg)"
            el.style.height = height.clientHeight+"px"
            el.style.opacity = 1
            el.style.marginTop = "30px"
        }
        else{
            btn.style.transform = "rotateZ(0deg)"
            el.style.height = 0
            el.style.opacity = 0
            el.style.marginTop = "0px"
        }
        
    }
</script>