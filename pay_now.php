<?php

require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
require('inc/paytm/config.php');

// Báo lỗi và cấu hình múi giờ
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);  // Hiển thị tất cả lỗi ngoại trừ E_NOTICE và E_DEPRECATED
date_default_timezone_set('Asia/Ho_Chi_Minh');  // Thiết lập múi giờ cho Việt Nam

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)){
    redirect('rooms.php');
  }





// Khởi tạo các tham số giao dịch
$vnp_TxnRef = 'UTH_'.$_SESSION['uId'].rand(1, 100000);// = ORDER_ID   

$CUST_ID = $_SESSION['uId'];



$vnp_Amount = $_SESSION['room']['payment'];   // =TXN_AMOUNT  




$vnp_Locale = 'vn'; //= CHANNEL_ID  // Ngôn ngữ của giao diện thanh toán (Nhận từ biểu mẫu)
$vnp_BankCode = 'NCB';// =$TXN_AMOUNT  // Mã ngân hàng hoặc phương thức thanh toán (Nhận từ biểu mẫu) cái này giữa nguyên 'NCB' không đối
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];  // Địa chỉ IP của khách hàng

// Mảng các tham số gửi đến VNPay
$inputData = array(
    "vnp_Version" => "2.1.0",  // Phiên bản của API VNPay
    "vnp_TmnCode" => $vnp_TmnCode,  // Mã Merchant (TmnCode)
    "vnp_Amount" => $vnp_Amount * 100,  // Số tiền thanh toán, chuyển thành đơn vị nhỏ nhất (ví dụ VND)
    "vnp_Command" => "pay",  // Lệnh giao dịch, trong trường hợp này là "pay" (thanh toán)
    "vnp_CreateDate" => date('YmdHis'),  // Thời gian tạo giao dịch theo định dạng YYYYMMDDHHMMSS
    "vnp_CurrCode" => "VND",  // Mã tiền tệ, trong trường hợp này là VND
    "vnp_IpAddr" => $vnp_IpAddr,  // Địa chỉ IP của người thanh toán
    "vnp_Locale" => $vnp_Locale,  // Ngôn ngữ giao diện (ví dụ: vn cho tiếng Việt, en cho tiếng Anh)
    "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,  // Thông tin mô tả giao dịch
    "vnp_OrderType" => "other",  // Loại giao dịch, trong trường hợp này là "other"
    "vnp_ReturnUrl" => $vnp_Returnurl,  // URL trả về sau khi giao dịch hoàn tất
    "vnp_TxnRef" => $vnp_TxnRef,  // Mã giao dịch thanh toán duy nhất
   
);


// Nếu mã ngân hàng (vnp_BankCode) được chọn, thêm vào mảng tham số
if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;  // Thêm mã ngân hàng vào tham số nếu có
}

// Sắp xếp các tham số theo thứ tự từ điển
ksort($inputData);

// Khởi tạo các biến để xây dựng chuỗi hash và URL
$query = "";  // Chuỗi truy vấn URL
$i = 0;  // Biến đếm cho việc nối các tham số
$hashdata = "";  // Dữ liệu để tính toán mã bảo mật

// Duyệt qua các tham số đã sắp xếp và tạo chuỗi truy vấn cùng dữ liệu hash
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        // Nếu là tham số sau cùng thì nối với dấu '&'
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        // Tham số đầu tiên không có dấu '&'
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;  // Đánh dấu là tham số đầu tiên
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';  // Tạo chuỗi truy vấn URL
}

// Tạo URL thanh toán VNPay
$vnp_Url = $vnp_Url . "?" . $query;  // Kết nối URL với các tham số truy vấn

// Nếu có khóa bí mật (vnp_HashSecret), tính toán mã bảo mật
if (isset($vnp_HashSecret)) {
    // Tính toán mã bảo mật bằng thuật toán SHA-512
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    
    // Thêm mã bảo mật vào URL
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}

// Xử lý các tham số trả về sau khi thanh toán
$STATUS = $_GET['vnp_ResponseCode'] ?? null;  // Mã phản hồi giao dịch == 0 là đúng
$CUST_ID = $_GET['vnp_TransactionNo'] ?? null;  // Mã giao dịch khách hàng
$DATA = $_GET['vnp_PayDate'] ?? null;  // Ngày giao dịch
$DISC = $_GET['vnp_OrderInfo'] ?? null;  // Nội dung giao dịch

$returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['pay_now'])) {
            $frm_data = filteration($_POST);

            $query1 = "INSERT INTO booking_order (user_id, room_id, check_in, check_out, order_id) 
                    VALUES (?, ?, ?, ?, ?)";

            insert($query1, [$CUST_ID, $_SESSION['room']['id'],$frm_data['Checkin'], $frm_data['Checkout'], $vnp_TxnRef],'issss');

            $booking_id = mysqli_insert_id($con);

            $query2 = "INSERT INTO booking_details ( booking_id, room_name, price, total_pay, user_name, phonenum, address) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            insert($query2,[$booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'], $vnp_Amount, $frm_data['name'],$frm_data['phonenum'],$frm_data['address']],'issssss');
        
            header('Location: ' . $vnp_Url);
        } else {
            echo json_encode($returnData);
        }


        
        

?>
