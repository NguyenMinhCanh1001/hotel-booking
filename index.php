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
<link rel="stylesheet" href="style.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
        <a class="navbar-brand me-5 pacifico-regular" href="index.php">UTH HOTEL</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse shadow-none" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active me-2" aria-current="page" href="#">Trang Chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">Phòng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">Cơ sở Vật chất</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">Liên hệ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">Giới thiệu</a>
              </li>
            </ul>
            <div class="d-flex">
              <button type="button" class="btn btn btn-outline-primary shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                đăng nhập
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
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Emali đăng nhập</label>
            <input type="email" class="form-control shadow-none">
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" class="form-control shadow-none">
        </div>
        <di>
          <button class="btn btn-outline-dark">Đăng Nhập</button>
        </di>
      </div>
    </form>
   
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>