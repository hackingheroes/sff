<?php
    include "Base/head.php";?>
<body>
    <header>
        <h1 class="title">SELECT TYPE OF FIELD</h1>
    </header>
  <section class="squared">
      <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url(img/basketball.jpg)"><a href="city.php?type=basketball">BASKETBALL</a></div>
            <div class="swiper-slide" style="background-image: url(img/football.jpg)"><a href="city.php?type=football">FOOTBALL</a></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
      <!-- <a class="square-2" href="city.php?type=basketball" style="background-image: url('img/basketball.jpg');">
        Basketball
     </a>
        <a class="square-2" href="city.php?type=football" style="background-image: url('img/football.jpg');">
        Football
        </a> -->
        <script>
    var slider = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 10,
        effect: 'fade',
        grabCursor: true,
    });

    </script>
</section>
</body>
<?php include "Base/foot.php";?>
