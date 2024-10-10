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
      </div>
    </div>
  </div>