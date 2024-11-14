<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Đặt phòng</title>

  
</head>
<body class="bg-light">
  <?php require('inc/header.php');

    if(!(isset($_SESSION['login']) && $_SESSION['login'] == true)){
      redirect('index.php');
  }
  
  ?>


  <div class="container">
    <div class="row">

      <div class="col-12 my-5 px-4">
        <h2 class="fw-bold">Đặt phòng</h2>
        <div style="font-size: 15px;">
          <a href="index.php" class="text-primary text-decoration-none">Trang chủ</a>
          <span class="text-secondary"> >> </span>
          <a href="#" class="text-primary text-decoration-none">Đặt phòng</a>
        </div>
      </div>

    <?php 
    
      $query = "SELECT bo.*, bd.* FROM `booking_order` bo
      INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
      WHERE (
          (bo.booking_status = 'booked') 
          OR (bo.booking_status = 'cancelled')
          OR (bo.booking_status = 'payment failed')
      ) 
      AND (bo.user_id = ?)
      ORDER BY bo.booking_id DESC";

      $result = select($query, [$_SESSION['uId']], 'i');

      while($data = mysqli_fetch_assoc($result)){
        $date = date("d-m-Y", strtotime($data['datetime']));
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        $status_bg = "";
        $btn = "";

        if($data['booking_status']=='booked'){
          $status_bg = "bg-success";

          if($data['arrival'] == 1)
          {
            $btn = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>Tải PDF</a>
                    <button type='button' class='btn btn-dark btn-sm shadow-none'>Đánh giá & Bình luận</button>";
           }
           else
           {
            $btn = "<button onclick='cancel_booking({$data['booking_id']})' type='button' class='btn btn-danger btn-sm shadow-none'>Hủy</button>";
           }    
        }
        else if($data['booking_status']=='cancelled'){
          $status_bg = "bg-danger";

          if($data['refund'] == 0){
            $btn = "<span class='badge bg-primary'>Đang trong quá trình hoàn tiền</span>";
          }
          else{
            $btn = "<a href='generate_pdf.php?gen_pdf&id={$data['booking_id']}' class='btn btn-dark btn-sm shadow-none'>Tải PDF</a>";
          }
        }
        else
        {
          $status_bg = "bg-warning";
          $btn = "<a href='generate_pdf.php?gen_pdf&id={$data['booking_id']}' class='btn btn-dark btn-sm shadow-none'>Tải PDF</a>";
        }

        $trans_amt = number_format($data['trans_amt'], 0, '', '.');

        echo <<<bookings
            <div class='col-md-4 px-4 mb-4'>
                <div class='bg-white p-3 rounded shadow-sm'>
                    <h5 class='fw-bold'>{$data['room_name']}</h5>
                    <p>{$data['price']} VNĐ/đêm</p>
                    <p>
                        <b>Ngày nhận: </b> $checkin <br> 
                        <b>Ngày trả: </b> $checkout
                    </p>
                    <p>
                        <b>Tổng tiền: </b> $trans_amt VNĐ <br>
                        <b>Mã đặt phòng: </b> {$data['order_id']} <br>
                        <b>Ngày thanh toán: </b> $date
                    </p>
                    <p>
                        <span class='badge $status_bg'>{$data['booking_status']}</span>
                    </p>
                    $btn
                </div>
            </div>
        bookings;

      }
      
    ?>

      

    </div>
  </div>


  <?php 

    if(isset($_GET['cancel_status'])){
      alert('success','Hủy phòng thành công!');
    }
  
  ?>
    <?php require('inc/footer.php')?>



    <script>
     function cancel_booking(id)
     {
        if(confirm('Bạn có chắc chắn muốn hủy phòng đã đặt này không?'))
        {
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "ajax/cancel_booking.php", true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          xhr.onload = function() {
              if(this.responseText == 1){
                window.location.href = "bookings.php?cancel_status=true";
              }
              else{
                alert('error','Hủy phòng không thành công!')
              }
          }
            xhr.send('cancel_booking&id=' +id);
        }
     }
    </script>


</body>
</html>