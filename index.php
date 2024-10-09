<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTH HOTEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body class="bg-light">
    <!-- mục lục -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
        <a class="navbar-brand me-5 pacifico-regular text-white" href="index.php">UTH HOTEL</a>
          <button class="navbar-toggler bg-white" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse shadow-none" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active me-2 text-white poppins-semibold" aria-current="page" href="#">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2 text-white poppins-semibold" href="#">Phòng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2 text-white poppins-semibold" href="#">Cơ sở Vật chất</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2 text-white poppins-semibold" href="#">Liên hệ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2 text-white poppins-semibold" href="#">Giới thiệu</a>
              </li>
            </ul>
            
            <!-- đăng kí -->
            <div class="d-flex">
              <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                Đăng nhập
              </button>
              <button type="button" class="btn btn-outline-light shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                Đăng kí
              </button>
            </div>
          </div>
        </div>
      </nav>

      
      <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person fs-3 me-2"></i>
             Đăng nhập tài khoản
            </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email đăng nhập</label>
            <input type="email" class="form-control shadow-none">
        </div>
        <div class="mb-4">
            <label class="form-label">Mật khẩu</label>
            <input type="password" class="form-control shadow-none">
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <button type="submit" class="btn btn-outline-dark shadown">Đăng Nhập</button>
          <a href="javascript: void(0)" class="text-secondary text-decoration-none">Quên mật khẩu?</a>
        </div>
      </div>
    </form>
   
    </div>
  </div>
</div>

  <!-- đăng kí -->
  <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form>
          <div class="modal-header">
              <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-add fs-3 me-2"></i>
              Đăng kí tài khoản
              </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body ">
        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
          Chú ý: Xin vui lòng đối chiếu thông tin cá nhân của bạn với giấy tờ tùy thân(CMND/CCCD) sẽ được yêu cầu trong quá trình nhận phòng.
        </span>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Họ</label>
            <input type="text" class="form-control shadow-none">
            </div>
            <div class="col-md-6 p-0">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control shadow-none">
              </div>
            </div>
        </div>
            <div class="mb-3">
            <label class="form-label">Email đăng nhập</label>
            <input type="email" class="form-control shadow-none">
        </div>
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="number" class="form-control shadow-none">
            </div>
            <div class="col-md-6 p-0">
            <label class="form-label">Ảnh của bạn</label>
            <input type="file" class="form-control shadow-none">
            </div>
          </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <textarea class="form-control shadow-none" rows="1"></textarea>
        </div>
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Pincode</label>
            <input type="number" class="form-control shadow-none">
            </div>
            <div class="col-md-6 p-0">
            <label class="form-label">Ngày sinh</label>
            <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Mật Khẩu</label>
            <input type="password" class="form-control shadow-none">
            </div>
            <div class="col-md-6 p-0">
            <label class="form-label">Nhập lại mật khẩu</label>
            <input type="password" class="form-control shadow-none">
            </div>
          </div>
          </div>
          <div class="text-center my-1">
          <button type="submit" class="btn btn-outline-dark shadown">Đăng kí</button>
        </div>
        </div>
      </form>
    <!-- ảnh bìa -->
      </div>
    </div>
  </div>
  <div class="container-fluid px-lg-4 mt-4">
  <div class="swiper swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="/images/AnhBia/1.webp" class="" />
      </div>
      <div class="swiper-slide">
        <img src="/images/AnhBia/2.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="/images/AnhBia/3.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="/images/AnhBia/4.webp" />
      </div>
      <div class="swiper-slide">
        <img src="/images/AnhBia/5.jpg" />
      </div>
    </div>
  </div>
  </div>

  <!-- kiểm tra phòng -->
  <div class="container availability-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="mb-4">Kiểm tra tình trạng phòng trống</h5>
        <form >
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
            <label class="form-label" style="font-weight: 500">Ngày nhận phòng</label>
            <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
            <label class="form-label" style="font-weight: 500">Ngày trả phòng</label>
            <input type="date" class="form-control shadow-none">
          </div>
          <div class="col-lg-3 mb-3">
          <label class="form-label" style="font-weight: 500">Người lớn</label>
          <select class="form-select shadow-none" >
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          </div>
          <div class="col-lg-2 mb-3">
          <label class="form-label" style="font-weight: 500">Trẻ em</label>
          <select class="form-select shadow-none" >
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          </div>
          <div class="col-lg-1 mb-lg-3 mt-2">
            <button type="submit" class="btn text-white shadow-none custom-bg">Nộp</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Phòng -->
  <h2 class="mt-5 pt-4 mb-4 text-center merienda-header">Phòng</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;  ">
        <img src="/images/Phong/1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 >Phòng bình dân</h5>
            <h6 class="mb-3">300.000 VND/đêm</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Điểm đặc trưng
              </h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng ngủ  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 ban công
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng tắm  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 ghế tình yêu
              </span>
            </div>
            <div class="facilities mb-4">
            <h6 class="mb-1">Tiện nghi</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
                Wife 
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Tivi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Điều hòa
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Cách âm
              </span>
              </div>
              <div class="rating mb-4">
              <h6 class="mb-1">Đánh giá</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
            </span>
              </div>
              <div class="d-flex justify-content-evenly mb-2">
                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Đặt phòng</a>
                <a href="#" class="btn btn-sm btn btn-outline-primary shadow-none ">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;  ">
        <img src="/images/Phong/1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 >Phòng bình dân</h5>
            <h6 class="mb-3">300.000 VND/đêm</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Điểm đặc trưng
              </h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng ngủ  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 ban công
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng tắm  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 ghế tình yêu
              </span>
            </div>
            <div class="facilities mb-4">
            <h6 class="mb-1">Tiện nghi</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
                Wife 
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Tivi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Điều hòa
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Cách âm
              </span>
              </div>
              <div class="rating mb-4">
              <h6 class="mb-1">Đánh giá</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
            </span>
              </div>
              <div class="d-flex justify-content-evenly mb-2">
                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Đặt phòng</a>
                <a href="#" class="btn btn-sm btn btn-outline-primary shadow-none ">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;  ">
        <img src="/images/Phong/1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 >Phòng bình dân</h5>
            <h6 class="mb-3">300.000 VND/đêm</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Điểm đặc trưng
              </h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng ngủ  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 ban công
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng tắm  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 ghế tình yêu
              </span>
            </div>
            <div class="facilities mb-4">
            <h6 class="mb-1">Tiện nghi</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
                Wife 
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Tivi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Điều hòa
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Cách âm
              </span>
              </div>
              <div class="rating mb-4">
              <h6 class="mb-1">Đánh giá</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
            </span>
              </div>
              <div class="d-flex justify-content-evenly mb-2">
                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Đặt phòng</a>
                <a href="#" class="btn btn-sm btn btn-outline-primary shadow-none ">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;  ">
        <img src="/images/Phong/1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 >Phòng bình dân</h5>
            <h6 class="mb-3">300.000 VND/đêm</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Điểm đặc trưng
              </h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng ngủ  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 ban công
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 phòng tắm  
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 ghế tình yêu
              </span>
            </div>
            <div class="facilities mb-4">
            <h6 class="mb-1">Tiện nghi</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
                Wife 
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Tivi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Điều hòa
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Cách âm
              </span>
              </div>
              <div class="rating mb-4">
              <h6 class="mb-1">Đánh giá</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
            </span>
              </div>
              <div class="d-flex justify-content-evenly mb-2">
                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Đặt phòng</a>
                <a href="#" class="btn btn-sm btn btn-outline-primary shadow-none ">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>




      <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 poppins-medium ">Thêm Phòng</a>
      </div>
    </div>
  </div>

  <!-- Tiện nghi -->
  <h2 class="mt-5 pt-4 mb-4 text-center merienda-header">Tiện nghi khách sạn</h2>
  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="/images/TienNghi/wifi.png" width="80px">
        <h5 class="mt-3">Wifi</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="/images/TienNghi/wifi.png" width="80px">
        <h5 class="mt-3">Wifi</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="/images/TienNghi/wifi.png" width="80px">
        <h5 class="mt-3">Wifi</h5>
      </div> <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="/images/TienNghi/wifi.png" width="80px">
        <h5 class="mt-3">Wifi</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="/images/TienNghi/wifi.png" width="80px">
        <h5 class="mt-3">Wifi</h5>
      </div>
      <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 poppins-medium ">Thêm tiện nghi</a>
      </div>
    </div>
  </div>

  <!-- đánh giá -->
  <h2 class="mt-5 pt-4 mb-4 text-center merienda-header">Đánh giá về khách sạn</h2>
  <div class="container mt-5">
  <div class="swiper swiper-testimonial ">
    <div class="swiper-wrapper mb-5">
      <div class="swiper-slide bg-white p-4">
        <div class="profile d-flex align-items-center mb-4 ">
          <img src="/images/TienNghi/star.png" width="30px" height="">
          <h6 class="m-0 ms-2">Phong 1</h6>
        </div>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat nemo recusandae saepe accusamus rem eligendi itaque vitae quas laborum ducimus?
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-half text-warning"></i>
        </div>
      </div>

      <div class="swiper-slide bg-white p-4">
        <div class="profile d-flex align-items-center mb-4 ">
          <img src="/images/TienNghi/star.png" width="30px" height="">
          <h6 class="m-0 ms-2">Phong 1</h6>
        </div>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat nemo recusandae saepe accusamus rem eligendi itaque vitae quas laborum ducimus?
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-half text-warning"></i>
        </div>
      </div>
      <div class="swiper-slide bg-white p-4">
        <div class="profile d-flex align-items-center mb-4 ">
          <img src="/images/TienNghi/star.png" width="30px" height="">
          <h6 class="m-0 ms-2">Phong 1</h6>
        </div>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat nemo recusandae saepe accusamus rem eligendi itaque vitae quas laborum ducimus?
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-half text-warning"></i>
        </div>
      </div>

     
    </div>
    <div class="swiper-pagination"></div>
  </div>

  <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 poppins-medium ">Thêm đánh giá</a>
      </div>

  </div>

   <!-- Địa chỉ và liên hệ -->
   <h2 class="mt-5 pt-4 mb-4 text-center merienda-header">Địa chỉ </h2>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
          <iframe class="w-100 rounded"  height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.294683886142!2d106.61638579999999!3d10.865176600000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a10b0f0554f%3A0x769800e8967d6703!2zNzAgxJAuIFTDtCBLw70sIFTDom4gQ2jDoW5oIEhp4buHcCwgUXXhuq1uIDEyLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1728482146568!5m2!1svi!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="bg-white p-4 rounded mb-4">
            <h5>Số liên hệ</h5>
            <a href="tel: +4596423472" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone"></i>
            +45 9642 3472 
          </a>
            <br>
            <a href="tel: +2453629787" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-telephone"></i>
            +24 5362 9787
          </a>
          </div>
          <div class="bg-white p-4 rounded mb-4">
            <h5>Theo dõi chúng tôi trên</h5>
            <a href="#" class="d-inline-block mb-2 ">
              <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-facebook me-l"></i> Facebook
              </span>
          </a>
          <br>
            <a href="#" class="d-inline-block mb-2 ">
              <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-tiktok"></i> TikTok
              </span>
          </a>
          <br>
            <a href="#" class="d-inline-block mb-2 ">
              <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-instagram"></i> Instagram
              </span>
          </a>
          
          </div>
        </div>
      </div>
    </div>

<div class="container-fluid bg-white mt-5">
  <div class="row">
    <div class="col-lg-4 p-4">
      <h3 class="merienda-header fs-3 mb-2"> UTH HOTEL</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis, excepturi laboriosam? Nulla ex, corporis quis dolores esse, totam nisi cum iusto odio aspernatur ipsa eos ducimus corrupti quod, quos suscipit.
      </p>
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Links</h5>
      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Trang chủ</a><br>
      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Phòng</a><br>
      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Cơ sở vật chất</a><br>
      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">liên hệ</a><br>
      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Giới thiệu</a><br>
      </div>
      <div class="col-lg-4 p-4">
        <h5 class="mb-3">Theo dõi chúng tôi trên</h5>
        <a href="#" class="d-inline-block text-dark text-decoration-none mb-3 ">
              <i class="bi bi-facebook me-l"></i> Facebook
          </a>
          <br>
            <a href="#" class="d-inline-block text-dark text-decoration-none mb-3 ">
              <i class="bi bi-tiktok"></i> TikTok
          </a>
          <br>
            <a href="#" class="d-inline-block text-dark text-decoration-none mb-2 ">
              <i class="bi bi-instagram"></i> Instagram
          </a>
      </div>
  </div>
</div>



<h6 class="text-center bg-dark text-white p-3 m-0">NHÓM 3</h6>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    
    <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction:false,
      }
    });

    var swiper = new Swiper(".swiper-testimonial", {
      grabCursor: true,
      effect: "creative",
      loop: true,
      creativeEffect: {
        prev: {
          shadow: true,
          translate: [0, 0, -400],
        },
        next: {
          translate: ["100%", 0, 0],
        },
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
</body>
</html>