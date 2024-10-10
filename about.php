<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTH HOTEL - Giới thiệu</title>
  <?php require('inc/links.php')?>
  <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <style>
    .bop:hover{
      border-top-color: skyblue !important ;
      transform: scale(1.03);
      transition: all 0s;
    }
  </style>

</head>
<body class="bg-light">
  <?php require('inc/header.php')?>

  <div class="my-5 px-4">
    <h2 class="merienda-header text-center ">Giới thiệu về khách sạn</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia officia, dolorem et similique obcaecati optio expedita vero veritatis?<br> Quasi dolores non officia quisquam incidunt explicabo, porro nemo ea saepe reprehenderit.
    </p>
  </div>

  <div class="container">
    <div class="row justify-content-between align-items-center ">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h3 class="mb-3">Lorem ipsum dolor sit amet.</h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, commodi sunt ex aut dolores aliquam at explicabo fuga molestiae quam, rem quisquam laboriosam et quibusdam laudantium ipsum reprehenderit ab numquam.
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="/images/GioiThieu/canh.jpg" class="img-about">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center bop">
          <img src="/images/GioiThieu/rooms.png" width="70px">
          <h4 class="mt-3">69+ phòng</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center bop">
          <img src="/images/GioiThieu/customers.jpg" width="70px">
          <h4 class="mt-3">69+ khách</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center bop">
          <img src="/images/GioiThieu/review.png" width="70px">
          <h4 class="mt-3">200+ đánh giá</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center bop">
          <img src="/images/GioiThieu/staff.png" width="70px">
          <h4 class="mt-3">69+ nhân viên</h4>
        </div>
      </div>
    </div>
  </div>

  <h3 class="my-5 merienda-header text-center">Đội ngũ quản lý</h3>

  <div class="container px-4 ">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5 ">
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="/images/GioiThieu/dat.jpg" >
        <h5 class="mt-2">Đạt09</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="/images/GioiThieu/sony.jpg" >
        <h5 class="mt-2">Sony</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="/images/GioiThieu/tuan.jpg" >
        <h5 class="mt-2">Tuandeptrai</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="/images/GioiThieu/dat.jpg" >
        <h5 class="mt-2">Đạt09</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="/images/GioiThieu/sony.jpg" >
        <h5 class="mt-2">Sony</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="/images/GioiThieu/tuan.jpg" >
        <h5 class="mt-2">Tuandeptrai</h5>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>

  </div>

    <?php require('inc/footer.php')?>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 40,
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
      breakpoints:{
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      }
    });
  </script>


</body>
</html>