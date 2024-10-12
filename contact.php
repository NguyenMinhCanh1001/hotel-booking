<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTH HOTEL - Liên hệ</title>
  <?php require('inc/links.php')?>
  
</head>
<body class="bg-light">
  <?php require('inc/header.php')?>

  <div class="my-5 px-4">
    <h2 class="merienda-header text-center ">Liên hệ với khách sạn</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia officia, dolorem et similique obcaecati optio expedita vero veritatis?<br> Quasi dolores non officia quisquam incidunt explicabo, porro nemo ea saepe reprehenderit.
    </p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="bg-white rounded shadow p-4 ">
        <iframe class="w-100 rounded mb-4"  height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.294683886142!2d106.61638579999999!3d10.865176600000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a10b0f0554f%3A0x769800e8967d6703!2zNzAgxJAuIFTDtCBLw70sIFTDom4gQ2jDoW5oIEhp4buHcCwgUXXhuq1uIDEyLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1728482146568!5m2!1svi!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          <h5>Địa chỉ</h5>
          <a href="https://maps.app.goo.gl/6dAmjSjSn3N4SGCaA" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
          <i class="bi bi-compass"></i> 70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh, Việt Nam
          </a>

          <h5 class="mt-4">Số liên hệ</h5>
            <a href="tel: +4596423472" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone"></i>
            +45 9642 3472 
          </a>
            <br>

            <a href="tel: +2453629787" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-telephone"></i>
            +24 5362 9787
          </a>
          <h5 class="mt-4">Email khách sạn</h5>
          <a href="mailto: phamtuan7592@gmail.com" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-envelope"></i>
          phamtuan7592@gmail.com</a>

          <h5 class="mt-4">Theo dõi chúng tôi trên</h5>
            <a href="#" class="d-inline-block mb-2 text-dark fs-5 me-2 ">
              <i class="bi bi-facebook me-l"></i> 
          </a>
            <a href="#" class="d-inline-block mb-2 text-dark fs-5 me-2 ">
              <i class="bi bi-tiktok"></i>
          </a>
            <a href="#" class="d-inline-block mb-2 text-dark fs-5">
              <i class="bi bi-instagram"></i>
          </a>

        </div>
      </div>
      <div class="col-lg-6 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4">
          <form>
            <h5>Gửi tin nhắn</h5>
            <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Tên Khách hàng</label>
            <input type="text" class="form-control shadow-none">
        </div>
        <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Email</label>
            <input type="email" class="form-control shadow-none">
        </div>
        <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Vấn đề</label>
            <input type="text" class="form-control shadow-none">
        </div>
        <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Nhắn tin</label>
            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
        </div>
        <button type="submit" class="btn text-white custom-bg mt-3">
          Gửi
        </button>
          </form>
        </div>
      </div>
    </div>
  </div>


    <?php require('inc/footer.php')?>

</body>
</html>