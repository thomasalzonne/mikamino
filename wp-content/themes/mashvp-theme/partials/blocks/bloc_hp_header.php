<?php
global $woocommerce;
$bool = get_sub_field('isvideo');
?>
<div class="mainnav grid">
    <?= wp_nav_menu('mainnav') ?>
    <div class="logo" onclick="window.location.href = '/mikamino'">
        <img class="log" src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/assets/img/logo.png"  alt="" >
        <img class="logob" src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/assets/img/logob.png"  alt="" >
    </div>
    <div class="profil">
        <div class="profilcontainer">
            <div class="compte" onclick="window.location.href = '/mikamino/mon-compte'">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="panier" onclick="window.location.href = '/mikamino/panier'">
                Panier
                <div class="itemincart">
                    <?= $woocommerce->cart->cart_contents_count; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobnav grid2">
    <a href="javascript:void(0);" onclick="myFunction()" class="btnmobmenu">Menu</a>
    <div class="profilmob">
        <div class="profilcontainermob">
            <div class="comptemob" onclick="window.location.href = '/mikamino/mon-compte'">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="paniermob" onclick="window.location.href = '/mikamino/panier'">
                Panier
                <div class="itemincart">
                    <?= $woocommerce->cart->cart_contents_count; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="myLinks">
        <?= wp_nav_menu('mainnav') ?>
    </div>

</div>
<?php if($bool == 1): ?>
    <?php
        $video = get_sub_field('video')['url'];
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
<div class="header">
    <div class="swiper-container mySwiper grid">
        <div class="swiper-wrapper">
            <?php if(have_rows('slide')): ?>
                <?php while(have_rows('slide')): the_row() ?>
                    <div class="swiper-slide" style="background-image: url('<?= get_sub_field('image')['url'] ?>')">
                        <p class="headertext" style='opacity: 0'><?= get_sub_field('text') ?></p>
                        <?php if(get_sub_field('btn_link') && get_sub_field('btn_text')): ?>
                            <a class="headersliderbtn" href="<?= get_sub_field('btn_link') ?>"><?= get_sub_field('btn_text') ?></a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
<script>
    var btnsliders = document.querySelectorAll('.headersliderbtn')
    Array.from(btnsliders).map(el => el.style.opacity = 0)
    var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
        return '<span class="' + className + '"> 0' + (index + 1) + "</span>";
        },
    },
    });
    var slide = document.querySelector('.swiper-slide-active')
    slide.children[0].style.transitionDuration = "1s";
    slide.children[0].style.opacity = 1
    slide.children[1].style.transitionDuration = "1s";
    slide.children[1].style.opacity = 1
    setTimeout(() => {
        var slide = document.querySelector('.swiper-slide-active')
        slide.children[0].style.transitionDuration = "1s";
        slide.children[0].style.opacity = 0
        slide.children[1].style.transitionDuration = "1s";
        slide.children[1].style.opacity = 0
    }, 4000);
    swiper.on('slideChangeTransitionEnd', function () {
        var slide = document.querySelector('.swiper-slide-active')
        slide.children[0].style.transitionDuration = "1s";
        slide.children[0].style.opacity = 1
        slide.children[1].style.transitionDuration = "1s";
        slide.children[1].style.opacity = 1
        setTimeout(() => {
            var slide = document.querySelector('.swiper-slide-active')
            slide.children[0].style.transitionDuration = "1s";
            slide.children[0].style.opacity = 0;
            slide.children[1].style.transitionDuration = "1s";
            slide.children[1].style.opacity = 0
        }, 4000);
    });
</script>
<?php endif; ?>
<script>
    if(screen.width >= 801){
        document.addEventListener('scroll', function(e){
            if(window.scrollY >= 900){
                var logo = document.querySelector('.logo')
                var nav = document.querySelector('.mainnav')
                var a = document.querySelectorAll('.mainnav a')
                var account = document.querySelector('.compte')
                var panier = document.querySelector('.panier')
                var bleft = document.querySelector('.menu-mainnav-container')
                var bright = document.querySelector('.profil')
                var log = document.querySelector('.log')
                var logob = document.querySelector('.logob')
                nav.classList.add("animnav")
                Array.from(a).map(el => el.style.color = "black")
                panier.style.color = "black"
                account.style.color = "black"
                bleft.style.borderBottom = "1px solid black"
                bright.style.borderBottom = "1px solid black"
                log.style.opacity = "0"
                logob.classList.add("animlogob")
                setTimeout(() => { 
                    if(window.scrollY >= 900){
                    logo.classList.add("animlogo")
                    }
                }, 1000);
            }
            else{
                var account = document.querySelector('.compte')
                var panier = document.querySelector('.panier')
                var nav = document.querySelector('.mainnav')
                var logo = document.querySelector('.logo')
                var a = document.querySelectorAll('.mainnav a')
                var bleft = document.querySelector('.menu-mainnav-container')
                var bright = document.querySelector('.profil')
                var log = document.querySelector('.log')
                var logob = document.querySelector('.logob')

                logo.style.borderBottom = "1px solid rgba(0,0,0,0)"
                nav.classList.remove("animnav")
                Array.from(a).map(el => el.style.color = "white")
                panier.style.color = "white"
                account.style.color = "white"
                bleft.style.borderBottom = "1px solid white"
                bright.style.borderBottom = "1px solid white"
                log.style.opacity = "1"
                logob.style.opacity = "0"
                logob.classList.remove("animlogob")
                logo.classList.remove("animlogo")
            }
        })
    }
    var txt = document.querySelectorAll(".headertext")
    var btnsliders = document.querySelectorAll('.headersliderbtn')
    var swipe = document.querySelector(".swiper-pagination")
    var size = screen.width
    if(size - 1520 > 0){
        a = (size - 1520)/2
        Array.from(txt).map(el => el.style.left = a+"px")
        Array.from(btnsliders).map(el => el.style.left = a+"px")
        swipe.style.left = a+"px";
    }else{
        Array.from(txt).map(el => el.style.left = "5%")
        Array.from(btnsliders).map(el => el.style.left = "5%")
        swipe.style.left = "5%";
    }
    function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    document.addEventListener('scroll', function(e) {
        var slides = document.querySelectorAll('.swiper-slide.swiper-slide-active')
        var mainnav = document.querySelector('.mainnav')
        var link = mainnav.querySelectorAll('a')
        var account = mainnav.querySelector('.compte')
        var logo = mainnav.querySelector('.log')
        var logob = mainnav.querySelector('.logob')
        var panier = mainnav.querySelector('.panier')
        var scroll = window.scrollY;
        var height = window.innerHeight
        var scale = (scroll / height) / 5
        scale = scale + 1
        var percentopacity = (scroll/height)
        var widt = percentopacity * 90
        var logowidth = (90 - widt)
        if(scroll > 0){
            logo.style.top = (height - scroll)/20 +"%"
            logo.style.width = logowidth + 'px'
            logob.style.top = (height - scroll)/20 +"%"
            logob.style.width = logowidth + 'px'
            logob.style.opacity = percentopacity
            mainnav.style.background = 'rgb(251, 248, 232,' + percentopacity +')'
            panier.style.color = "black"
            account.style.color = "black"
            Array.from(link).map(el => {
                el.style.color = "black"
            })
        }
        else{
            logo.style.background = "linear-gradient(180deg, #000000 -70%, rgba(0, 0, 0, 0) 100%);}"
            panier.style.color = "white"
            account.style.color = "white"
            Array.from(link).map(el => {
                el.style.color = "white"
            })
        }

        var slide = document.querySelectorAll('.swiper-slide')
        Array.from(slide).map(el => {
            el.style.transform = "scale(1)"
        })
        Array.from(slides).map(el => {
            el.style.transform = "scale("+ scale + ")"
        })
    })
</script>