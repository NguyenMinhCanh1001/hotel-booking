

    <!-- mục lục -->
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-dark px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 pacifico-regular text-white" href="index.php"><?php echo $settings_r['site_title'] ?></a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse shadow-none" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2 text-white poppins-semibold" 
                            href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 text-white poppins-semibold" href="rooms.php">Phòng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 text-white poppins-semibold" href="facilities.php">Cơ sở Vật chất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 text-white poppins-semibold" href="contact.php">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 text-white poppins-semibold" href="about.php">Giới thiệu</a>
                    </li>
                </ul>

                <!-- đăng kí -->
                <div class="d-flex">
                    <?php 
                       if (isset($_SESSION['login']) && $_SESSION['login'] == true)
                       {
                        $path = USERS_IMG_PATH;
                        echo <<<data
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary shadow-none dropdown-toggle custom-dropdown-button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    <img src="$path$_SESSION[uPic]" style="width: 25px; height: 25px;" class="me-1 rounded-circle">
                                    $_SESSION[uName]
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end custom-dropdown-menu">
                                    <li><a class="dropdown-item" href="profile.php">Hồ sơ cá nhân</a></li>
                                    <li><a class="dropdown-item" href="bookings.php">Đặt phòng</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                                </ul>
                            </div>
                        data;

                       }
                       else{
                            echo<<<data
                                <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" data-bs-toggle="modal"data-bs-target="#loginModal">
                                    Đăng nhập
                                </button>
                                <button type="button" class="btn btn-outline-light shadow-none" data-bs-toggle="modal"data-bs-target="#registerModal">
                                    Đăng kí
                                </button>
                            data;
                       }
                    ?>
                    
                </div>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person fs-3 me-2"></i>
                            Đăng nhập tài khoản
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email_mob" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="pass" class="form-control shadow-none" required>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="submit" class="btn btn-outline-dark shadown">Đăng Nhập</button>
                            <button type="button" class="btn text-secondary text-decoration-none shadow-none p-0" data-bs-toggle="modal"data-bs-target="#forgotModal" data-bs-dismiss="modal">
                                Quên mật khẩu?
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- đăng kí -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-add fs-3 me-2"></i>
                            Đăng kí tài khoản
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Chú ý: Xin vui lòng đối chiếu thông tin cá nhân của bạn với giấy tờ tùy thân(CMND/CCCD) sẽ
                            được yêu cầu trong quá trình nhận phòng.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Họ và tên</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Email đăng nhập</label>
                                    <input name="email" type="email" class="form-control shadow-none" required>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input name="phonenum" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Ảnh của bạn</label>
                                    <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pincode</label>
                                    <input name="pincode" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Ngày sinh</label>
                                    <input name="dob" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Mật Khẩu</label>
                                    <input name="pass" type="password" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Nhập lại mật khẩu</label>
                                    <input name="cpass" type="password" class="form-control shadow-none" required>
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

    <!-- quên mật khẩu -->            
    <div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="forgot-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person fs-3 me-2"></i>
                            Quên mật khẩu
                        </h5>
                    </div>
                    <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base ">
                            Chú ý:Chúng tôi sẽ gửi một link để đặt lại mật khẩu đến email của bạn.
                        </span>
                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-2 text-end">
    
                            <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                                Hủy bỏ
                            </button>
                            <button type="submit" class="btn btn-dark shadown">Tiếp tục</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>