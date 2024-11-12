<?php
// Thiết lập múi giờ cho Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');

/*
 * Cấu hình các thông số kết nối đến VNPay
 */

// Mã định danh merchant kết nối (Terminal ID)
$vnp_TmnCode = "78VQ7ZEF"; 

// Khóa bí mật dùng để tạo mã bảo mật trong giao dịch
$vnp_HashSecret = "XXINFP8GN4KV81INT835JAQLK92CY4W4"; 

// URL của VNPay để thực hiện thanh toán (URL thanh toán trên môi trường sandbox)
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

// URL trả về sau khi giao dịch hoàn tất, có thể là trang xác nhận đơn hàng
$vnp_Returnurl = "http://localhost:3000/pay_response.php";

// URL API của VNPay để truy vấn giao dịch hoặc hủy giao dịch
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

// URL API của VNPay để thực hiện các giao dịch liên quan đến merchant
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";

// Cấu hình thời gian hết hạn của giao dịch
$startTime = date("YmdHis");  // Thời gian bắt đầu giao dịch, định dạng là YmdHis (năm tháng ngày giờ phút giây)
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));  // Thời gian hết hạn là 15 phút sau thời gian bắt đầu
?>
