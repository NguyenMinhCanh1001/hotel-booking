<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Bảng điều khiển quản trị</title>
      <?php require('inc/links.php'); ?>
  </head>
  <body class="bg-white">

      <?php 

        require('inc/header.php');

        $is_shutdown = mysqli_fetch_assoc(mysqli_query($con, "SELECT `shutdown` FROM `settings`"));

        $current_bookings = mysqli_fetch_assoc(mysqli_query($con, "SELECT 
        COUNT(CASE WHEN booking_status = 'booked' AND arrival = 0 THEN 1 END ) AS `new_bookings`,
        COUNT(CASE WHEN booking_status = 'cancelled' AND refund = 0 THEN 1 END) AS `refund_bookings`
        FROM `booking_order`"));

        $unread_queries = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(sr_no) AS `count` FROM `user_queries` WHERE `seen`= 0"));

        $unread_reivews = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(sr_no) AS `count` FROM `rating_review` WHERE `seen`= 0"));

        $current_urers = mysqli_fetch_assoc(mysqli_query($con, "SELECT
        COUNT(id) AS `total`,
        COUNT(CASE WHEN `status` = 1 THEN 1 END ) AS `active`,
        COUNT(CASE WHEN `status` = 0 THEN 1 END) AS `inactive`,
        COUNT(CASE WHEN `is_verified` = 0 THEN 1 END) AS `unverified`
        FROM `user_cred`"));


      ?>

      <div class="container-fluid" id="main-content">
        <div class="row">
          <div class="col-lg-10 ms-auto p-4 overflow-hidden">

            <div class="d-flex align-items-center justify-content-between mb-4">
              <h3>Bảng điều khiển</h3>
              <?php 
                if($is_shutdown['shutdown']){
                  echo<<<data
                    <h6 class="badge bg-danger py-2 px-3 rounded">Chế độ tắt web đang hoạt động</h6>
                  data;
                }
              ?>
            </div>

            <div class="row mb-4">
              <div class="col-md-3 mb-4">
                <a href="new_bookings.php" class="text-decoration-none">
                  <div class="card text-center text-success p-3">
                    <h6>Đặt phòng mới</h6>
                    <h1 class="mt-2 mb-0"><?php echo $current_bookings['new_bookings'] ?></h1>
                  </div>
                </a>
              </div>
              <div class="col-md-3 mb-4">
                <a href="refund_bookings.php" class="text-decoration-none">
                  <div class="card text-center text-warning p-3">
                    <h6>Hoàn tiền đặt phòng</h6>
                    <h1 class="mt-2 mb-0"><?php echo $current_bookings['refund_bookings'] ?></h1>
                  </div> 
                  
                </a>
              </div>
              <div class="col-md-3 mb-4">
                <a href="user_queries.php" class="text-decoration-none">
                  <div class="card text-center text-info p-3">
                    <h6>Truy vấn khách hàng</h6>
                    <h1 class="mt-2 mb-0"><?php echo $unread_queries['count'] ?></h1>
                  </div> 
                </a>
              </div>
              <div class="col-md-3 mb-4">
                <a href="rate_review.php" class="text-decoration-none">
                  <div class="card text-center text-info p-3">
                    <h6>Đánh giá & Bình luận</h6>
                    <h1 class="mt-2 mb-0"><?php echo $unread_reivews['count'] ?></h1>
                  </div> 
                </a>
              </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5>Thống kê đặt phòng</h5>
              <select class="form-select shadow-none bg-light w-auto" onchange="booking_analytics(this.value)">
                <option value="1">30 ngày qua</option>
                <option value="2">90 ngày qua</option>
                <option value="3">1 năm qua</option>
                <option value="4">Tất cả</option>
              </select>
            </div>

            <div class="row mb-3">
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-primary text-primary p-3">
                    <h6>Tổng số đặt phòng</h6>
                    <h1 class="mt-2 mb-0" id="total_bookings">0</h1>
                    <h4 class="mt-2 mb-0" id="total_amt">5VNĐ</h4>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-primary text-success p-3">
                    <h6>Phòng đã đặt.</h6>
                    <h1 class="mt-2 mb-0" id="active_bookings">0</h1>
                    <h4 class="mt-2 mb-0" id="active_amt">5VNĐ</h4>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-info text-success p-3">
                    <h6>Phòng đã hủy.</h6>
                    <h1 class="mt-2 mb-0" id="cancelled_bookings">0</h1>
                    <h4 class="mt-2 mb-0" id="cancelled_amt">5VNĐ</h4>
                  </div>
              </div>
            </div>


            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5>Phân tích khách hàng, câu hỏi và đánh giá</h5>
              <select class="form-select shadow-none bg-light w-auto" onchange="user_analytics(this.value)">
                <option value="1">30 ngày</option>
                <option value="2">90 ngày</option>
                <option value="3">1 năm </option>
                <option value="4">Tất cả</option>
              </select>
            </div>

            <div class="row mb-3">
              <div class="col-md-3 mb-4">
                  <div class="card text-center text- text-success p-3">
                    <h6>Đăng ký mới</h6>
                    <h1 class="mt-2 mb-0" id="total_new_reg">0</h1>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-primary text- p-3">
                    <h6>Câu hỏi</h6>
                    <h1 class="mt-2 mb-0" id="total_queries">0</h1>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-info text-success p-3">
                    <h6>Đánh giá</h6>
                    <h1 class="mt-2 mb-0" id="total_review">0</h1>
                  </div>
              </div>
            </div>

            <h5>Tài khoản</h5>
            <div class="row mb-3">
              <div class="col-md-3 mb-4">
                  <div class="card text-center text- text-info p-3">
                    <h6>Tổng số</h6>
                    <h1 class="mt-2 mb-0"><?php echo $current_urers['total'] ?></h1>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-success text- p-3">
                    <h6>Hoạt động</h6>
                    <h1 class="mt-2 mb-0"><?php echo $current_urers['active'] ?></h1>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-info text-warning p-3">
                    <h6>Bị khóa</h6>
                    <h1 class="mt-2 mb-0"><?php echo $current_urers['inactive'] ?></h1>
                  </div>
              </div>
              <div class="col-md-3 mb-4">
                  <div class="card text-center text-info text-danger p-3">
                    <h6>Chưa xác minh</h6>
                    <h1 class="mt-2 mb-0"><?php echo $current_urers['unverified'] ?></h1>
                  </div>
              </div>
            </div>









          </div>
        </div>
      </div>

      <?php require('inc/scripts.php'); ?>
      <script src="scripts/dashboard.js"></script>
  </body>
</html>