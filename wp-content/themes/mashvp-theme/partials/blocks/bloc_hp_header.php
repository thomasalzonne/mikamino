<div class="mainnav grid">
    <?= wp_nav_menu('mainnav') ?>
    <div class="logo">
        <img class="log" src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/assets/img/logo.png"  alt="" >
        <img class="logob" src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/assets/img/logob.png"  alt="" >
    </div>
    <div class="profil">
        <div class="profilcontainer">
            <div class="compte">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="panier">
                Panier
            </div>
        </div>
    </div>
</div>
<div class="mobnav grid2">
    <a href="javascript:void(0);" onclick="myFunction()" class="btnmobmenu">Menu</a>
    <div class="profilmob">
        <div class="profilcontainermob">
            <div class="comptemob">
                Mon compte
                <?php include  get_template_directory() . "/assets/img/account.svg" ?>
            </div>
            <div class="paniermob">
                Panier
                <div class="itemincart">
                    0
                </div>
            </div>
        </div>
    </div>
    <div id="myLinks">
        <?= wp_nav_menu('mainnav') ?>
    </div>

</div>
<div class="header">
    <div class="swiper-container mySwiper grid">
        <div class="swiper-wrapper">
            <?php if(have_rows('slide')): ?>
                <?php while(have_rows('slide')): the_row() ?>
                    <div class="swiper-slide" style="background-image: url('<?= get_sub_field('image')['url'] ?>')">
                        <p class="headertext"><?= get_sub_field('text') ?></p>
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
    var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 10000,
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
</script>
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
                    logo.style.borderBottom = "1px solid black"
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

                logo.style.borderBottom = "unset"
                nav.classList.remove("animnav")
                Array.from(a).map(el => el.style.color = "white")
                panier.style.color = "white"
                account.style.color = "white"
                bleft.style.borderBottom = "1px solid white"
                bright.style.borderBottom = "1px solid white"
                log.style.opacity = "1"
                logob.style.opacity = "0"
                logob.classList.remove("animlogob")
            }
        })
    }
    var txt = document.querySelectorAll(".headertext")
    var swipe = document.querySelector(".swiper-pagination")
    var size = screen.width
    if(size - 1520 > 0){
        a = (size - 1520)/2
        Array.from(txt).map(el => el.style.left = a+"px")
        swipe.style.left = a+"px";
    }else{
        Array.from(txt).map(el => el.style.left = "5%")
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
</script>