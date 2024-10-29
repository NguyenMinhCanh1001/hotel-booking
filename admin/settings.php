<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-white">

    <?php require('inc/header.php');?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4"> Cài đặt</h3>
                <!-- general settings section-->
                <!-- phần cài đặt chung-->

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Cài đặt chung</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> Chỉnh sửa
                            </button>
                        </div>

                        <h6 class="card-subtitle mb-1 fw-bold">Tiêu đề</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Giới thiệu về khách sạn</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>

                <!-- general settings modal-->
                <!-- chi tiết cài đặt chung-->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cài đặt chung</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold ">Tiêu đề </label>
                                        <input type="text" name="site_title" id="site_title_inp"
                                            class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Giới thiệu về khách sạn</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none"
                                            rows="6" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about"
                                        class="btn text-secondary shadow-none" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Đồng ý</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- shutdown section-->
                <!--Đóng trang web-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Đóng trang web</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox"
                                        id="shutdown-toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text">
                            content
                        </p>
                    </div>
                </div>

                <!-- contact settings  section-->
                <!-- phần thông tin liên hệ -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Cài đặt liên hệ</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i> Chỉnh sửa
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Điạ chỉ</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Số điện thoại</h6>
                                    <p class="card-text mb-1"><i class="bi bi-telephone"></i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text"><i class="bi bi-telephone"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Link mạng xã hội</h6>
                                    <p class="card-text mb-1"><i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text mb-1"><i class="bi bi-tiktok"></i>
                                        <span id="tt"></span>
                                    </p>
                                    <p class="card-text"><i class="bi bi-instagram"></i>
                                        <span id="insta"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Bản đồ</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


                <!-- contact details modal-->
                <!-- chi tiết liên hệ -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cài đặt liên hệ</h5>
                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold ">Đia chỉ</label>
                                                    <input type="text" name="address" id="address_inp"
                                                        class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold ">Link Google map</label>
                                                    <input type="text" name="gmap" id="gmap_inp"
                                                        class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold ">Số điện thoại </label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-telephone"></i></span>
                                                        <input type="number" name="pn1" id="pn1_inp"
                                                            class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-telephone"></i></span>
                                                        <input type="number" name="pn2" id="pn2_inp"
                                                            class="form-control shadow-none">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold ">Email</label>
                                                        <input type="email" name="email" id="email_inp"
                                                            class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold ">Link mạng xã hội</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-facebook "></i></span>
                                                        <input type="text" name="fb" id="fb_inp"
                                                            class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-tiktok"></i></span>
                                                        <input type="text" name="tt" id="tt_inp"
                                                            class="form-control shadow-none" >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-instagram"></i></span>
                                                        <input type="text" name="insta" id="insta_inp"
                                                            class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold ">Bản đồ</label>
                                                        <input type="text" name="iframe" id="iframe_inp"
                                                            class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick=" contacts_inp(contacts_data);"
                                        class="btn text-secondary shadow-none" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Đồng ý</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Management Team section-->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Đội ngũ quản lý</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#team-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>


                        <div class="row" id="team-data">


                        </div>
                    </div>
                </div>

                <!-- Management Team modal-->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Team Member</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold ">Name </label>
                                        <input type="text" name="member_name" id="member_name_inp"
                                            class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input type="file" name="member_picture" id="member_picture_inp"
                                            accept="[.jpg, .png, .webp, .jpeg ]" class="form-control shadow-none"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="member_name.value='',member_picture.value=''"
                                        class="btn text-secondary shadow-none" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn text-secondary shadow-none">Đồng ý</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script src="scripts/settings.js"></script>
</body>

</html>