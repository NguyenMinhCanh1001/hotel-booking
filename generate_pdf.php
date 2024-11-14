<?php

require('admin/inc/essentials.php');
require('admin/inc/db_config.php');
require('admin/inc/mpdf/vendor/autoload.php');

session_start();

if(!(isset($_SESSION['login']) && $_SESSION['login'] == true)){
    redirect('index.php');
}


if (isset($_GET['gen_pdf']) && isset($_GET['id'])) {
    $frm_data = filteration($_GET);

    $query = "SELECT bo.*, bd.*, uc.email FROM `booking_order` bo
        INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
        INNER JOIN `user_cred` uc ON bo.user_id = uc.id
        WHERE (
            (bo.booking_status = 'booked' AND bo.arrival = 1) 
            OR (bo.booking_status = 'cancelled' AND bo.refund = 1)
            OR (bo.booking_status = 'payment failed')
        ) 
        AND bo.booking_id = '{$frm_data['id']}'";
        
    $res = mysqli_query($con, $query);
    $total_rows = mysqli_num_rows($res);

    if ($total_rows == 0) {
        header('location: index.php');
        exit;
    }

    $data = mysqli_fetch_assoc($res);
    $date = date("H:ia | d-m-Y", strtotime($data['datetime']));
    $checkin = date("d-m-Y", strtotime($data['check_in']));
    $checkout = date("d-m-Y", strtotime($data['check_out']));

    // HTML content for the booking receipt
    $table_data = "
    <h2>BOOKING RECEIPT</h2>
    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <td>Order ID: {$data['order_id']}</td>
            <td>Booking Date: {$date}</td>
        </tr>
        <tr>
            <td colspan='2'>Status: {$data['booking_status']}</td>
        </tr>
        <tr>
            <td>Name: {$data['user_name']}</td>
            <td>Price per night: VND {$data['price']}</td>
        </tr>
        <tr>
            <td>Phone Number: {$data['phonenum']}</td>
            <td>Room Name: {$data['room_name']}</td>
        </tr>
        <tr>
            <td>Address: {$data['address']}</td>
            <td>Email: {$data['email']}</td>
        </tr>
        <tr>
            <td>Check-in: {$checkin}</td>
            <td>Check-out: {$checkout}</td>
        </tr>
        ";
    if($data['booking_status']=='cancelled'){
        $refund = ($data['refund']) ? "Amount Refunded" : "not yet Refunded";
        
        $table_data.="<tr>
            <td>Amount Paid: $data[trans_amt]</td>
            <td>Refund: $refund</td>
        </tr>";
    }
    else if($data['booking_status']=='payment failed'){
        $table_data.="<tr>
        <td>Transaction Amount : $data[trans_amt]</td>
        <td>Failure Respone: $data[trans_resp_msg]</td>
    </tr>";
    }
    else{
        $table_data .= "<tr>
        <td>Room number: {$data['room_no']}</td>
        <td>Amount Paid: " . number_format($data['trans_amt'], 0, '', '.') . "</td>
    </tr>";

    }
    $table_data.="</table>";


    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($table_data);
    
    
    $mpdf->Output($data['order_id'] . '.pdf', 'D');
    
    echo $table_data;
    
} else {
    header('location: index.php');
}
?>
