<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-light">
    <?php require('inc/header.php')?>

    <!-- ảnh bìa -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                    $res= selectAll('carousel');
                    while ($row = mysqli_fetch_assoc($res)) {
                        $path = CAROUSEL_IMG_PATH; 
                        echo <<<data
                        
                        <div class="swiper-slide">
                            <img src="$path$row[image]" />
                        </div>                 
                        data;
                        }
                ?>
            </div>
        </div>
    </div>

    <!-- kiểm tra phòng -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Kiểm tra tình trạng phòng trống</h5>
                <form>
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
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500">Trẻ em</label>
                            <select class="form-select shadow-none">
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
        <?php 
        $room_res = select("SELECT * FROM `rooms` WHERE `status` = ? AND `removed` = ?  ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

        while($room_data = mysqli_fetch_assoc($room_res))
        {
            //get features of room

            $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id = '$room_data[id]'");

            $features_data = "";
            while($fea_row = mysqli_fetch_assoc($fea_q)){

              $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                      $fea_row[name]
                    </span>";
            }

            //get facilities of room

            $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities`f INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id = '$room_data[id]';");

            $facilities_data = "";
            while($fac_row = mysqli_fetch_assoc($fac_q)){

              $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                      $fac_row[name]
                    </span>";

          }

          // get thumbnail of imgae

          $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
          $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
          WHERE `room_id` = '$room_data[id]' 
          AND `thumb` = '1'");

          if(mysqli_num_rows($thumb_q) > 0){
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
          }
          
          $book_btn = "";

          if(!$settings_r['shutdown']){
            $login = 0;
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                $login = 1;
            }
        
            $book_btn = "<button onclick='checkLoginToBook($lo)' class='btn btn-sm text-white custom-bg shadow-none'>Đặt phòng</button>";
        }
        

          //print room card
          echo <<<data
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;  ">
                    <img src="$room_thumb" class="card-img-top">
                    <div class="card-body">
                        <h5>$room_data[name]</h5>
                        <h6 class="mb-3">$room_data[price]VND/đêm</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Điểm đặc trưng
                            </h6>
                           $features_data
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Tiện nghi</h6>
                           $facilities_data
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Khách hàng</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                 $room_data[adult] người lớn
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[children] trẻ con
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
                            $book_btn
                            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn btn-outline-primary shadow-none ">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
          data;

        }


        
      ?>


            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 poppins-medium ">Thêm Phòng</a>
            </div>
        </div>
    </div>

    <!-- Tiện nghi -->
    <h2 class="mt-5 pt-4 mb-4 text-center merienda-header">Tiện nghi khách sạn</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <?php
                $res= mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res)){
                echo<<<data
                    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                        <img src="$path$row[icon]" width="60px">
                        <h5 class="mt-3">$row[name]</h5>
                    </div>
                data;
                }
          ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 poppins-medium ">Thêm tiện nghi</a>
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
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat nemo recusandae saepe
                        accusamus rem eligendi itaque vitae quas laborum ducimus?
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
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat nemo recusandae saepe
                        accusamus rem eligendi itaque vitae quas laborum ducimus?
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
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat nemo recusandae saepe
                        accusamus rem eligendi itaque vitae quas laborum ducimus?
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
            <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 poppins-medium ">Thêm đánh giá</a>
        </div>

    </div>

    <!-- Địa chỉ và liên hệ -->


    <h2 class="mt-5 pt-4 mb-4 text-center merienda-header">Địa chỉ </h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Số liên hệ</h5>
                    <a href="tel: <?php echo $contact_r['pn1'] ?>"
                        class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone"></i>
                        <?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>
                    <?php 
                        if ($contact_r['pn2'] != '') {
                            echo <<<data
                                <a href="tel:{$contact_r['pn2']}" class="d-inline-block text-decoration-none text-dark">
                                    <i class="bi bi-telephone"></i> {$contact_r['pn2']}
                                </a>
                            data;
                        }
                    ?>



                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Theo dõi chúng tôi trên</h5>
                    <?php
                        if ($contact_r['tt'] != "") {
                            echo <<< data
                            <a href="{$contact_r['tt']}" target="_blank"  class="d-inline-block mb-2">
                                <span class="badge bg-light text-dark fs-6 p-2">
                                    <i class="bi bi-tiktok"></i>TikTok
                                </span>
                            </a>
                            <br>
                            data;
                        }
                        ?>

                    <a href="<?php echo $contact_r['fb']; ?>" class="d-inline-block mb-2 "  target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i>Facebook
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['insta']; ?>" class="d-inline-block mb-2 " target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram"></i> Instagram
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Passwoir reset modal and code -->

    <div class="modal fade" id="recoverytModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="recovery-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-shield-lock-fill fs-3 me-2"></i>
                            Thiết lập mật khẩu mới
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" name="pass" class="form-control shadow-none" required>
                            <input type="hidden" name="email">
                            <input type="hidden" name="token">
                        </div>
                        <div class="mb-2 text-end">
    
                            <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">
                                Hủy bỏ
                            </button>
                            <button type="submit" class="btn btn-dark shadown">OK</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php require('inc/footer.php')?>


    <?php 
    
        if(isset($_GET['account_recovery'])){

            $data = filteration($_GET);

            $t_data = date("Y-m-d");

            $query = select("SELECT * FROM `user_cred` WHERE `email` = ? AND `token` = ? AND `t_expire` = ? LIMIT 1", [$data['email'], $data['token'], $t_data], 'sss');
            
            if(mysqli_num_rows($query) == 1){
               echo<<<showModal
                    <script>
                        var myModal = document.getElementById('recoverytModal');

                        myModal.querySelector("input[name='email']").value = '{$data['email']}';
                        myModal.querySelector("input[name='token']").value = '{$data['token']}';

                        var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                        modal.show();
                    </script>
               showModal;
            }
            else{
                alert("error","Link không hợp lệ hoặc đã hết hạn!");
            }
        }

    ?>


    <script src=" https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
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

    //recover account

    let recovery_form = document.getElementById('recovery-form');

    recovery_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email', recovery_form.elements['email'].value);
        data.append('token', recovery_form.elements['token'].value);
        data.append('pass', recovery_form.elements['pass'].value);
        data.append('recovery_user', '');


        var myModal = document.getElementById('recoverytModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);



        xhr.onload = function() {
            if(this.responseText == 'failed'){
                alert('error','Đặt lại tài khoản thất bại!');
            }
            else{
                alert('success','Đặt lại tài khoản thành công');
                recovery_form.reset();
            }
        }

            xhr.send(data); 
            
    });

</script>
</body>

</html>