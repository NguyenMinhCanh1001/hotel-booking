<?php

    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');
    require('inc/paytm/config.php');

    // Báo lỗi và cấu hình múi giờ
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);  // Hiển thị tất cả lỗi ngoại trừ E_NOTICE và E_DEPRECATED
    date_default_timezone_set('Asia/Ho_Chi_Minh');  // Thiết lập múi giờ cho Việt Nam

    session_start();
    unset($_SESSION['room']);
    function regenerate_session($uid){
        $user_q = select("SELECT * FROM `user_cred` WHERE `id`= ? LIMIT 1",[$uid],'i');
        $user_fetch = mysqli_fetch_assoc($user_q);

        $_SESSION['login'] = true;
        $_SESSION['uId'] = $user_fetch['id'];
        $_SESSION['uName'] = $user_fetch['name'];
        $_SESSION['uPic'] = $user_fetch['profile'];
        $_SESSION['uPhone'] = $user_fetch['phonenum'];

    }

  

    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    if ($secureHash == $vnp_SecureHash) {
        $vnp_TxnRef = $_GET['vnp_TxnRef'];

        $slct_query = "SELECT `booking_id`, `user_id` FROM `booking_order` WHERE `order_id` = '$vnp_TxnRef'";
        
        $slct_res = mysqli_query($con, $slct_query);

        if(mysqli_num_rows($slct_res) == 0){
            redirect('index.php');
        }
        
        $slct_fetch = mysqli_fetch_assoc($slct_res);

        if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)){
            regenerate_session($slct_fetch['user_id']);
        }

           

        // Checksum hợp lệ
        if ($_GET['vnp_ResponseCode'] == '00') 
        {
            $trans_id = $_GET['vnp_TransactionNo'];
            $trans_amt = $_GET['vnp_Amount'] / 100;
            $trans_status = $_GET['vnp_ResponseCode'];
            $trans_resp_msg = $_GET['vnp_OrderInfo'];

            $upd_query = "UPDATE `booking_order` 
                          SET `booking_status`='booked', 
                              `trans_id`='$trans_id', 
                              `trans_amt`='$trans_amt',
                              `trans_status`='$trans_status',
                              `trans_resp_msg`='$trans_resp_msg' 
                          WHERE `booking_id` ='$slct_fetch[booking_id]'";

            mysqli_query($con, $upd_query);
            redirect('pay_status.php?order=' . urlencode($vnp_TxnRef));

        } 
        else {

            $upd_query = "UPDATE `booking_order` 
                          SET `booking_status`='payment failed', 
                              `trans_id`='$trans_id', 
                              `trans_amt`='$trans_amt',
                              `trans_status`='$trans_status',
                              `trans_resp_msg`='$trans_resp_msg' 
                          WHERE `booking_id` ='$slct_fetch[booking_id]'";

            mysqli_query($con, $upd_query);
        }
        redirect('pay_status.php?order=' . urlencode($vnp_TxnRef));
    } 
    else {
        redirect('index.php');
    }
  ?>
