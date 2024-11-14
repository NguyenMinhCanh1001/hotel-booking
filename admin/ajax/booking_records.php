<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['get_bookings'])) {
    $frm_data = filteration($_POST);
    $limit = 2;  // Số bản ghi trên mỗi trang
    $page = isset($frm_data['page']) ? $frm_data['page'] : 1;
    $start = ($page - 1) * $limit;

    // Câu truy vấn chính để lấy dữ liệu
    $query = "SELECT bo.*, bd.* FROM `booking_order` bo
    INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
    WHERE (
        (bo.booking_status = 'booked' AND bo.arrival = 1) 
        OR (bo.booking_status = 'cancelled' AND bo.refund = 1)
        OR (bo.booking_status = 'payment failed')
    ) 
    AND (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ?)
    ORDER BY bo.booking_id DESC";

    // Lấy tất cả kết quả (để tính tổng số dòng)
    $res = select($query, ["%{$frm_data['search']}%", "%{$frm_data['search']}%", "%{$frm_data['search']}%"], 'sss');
    $limit_query = $query . " LIMIT $start, $limit";
    // Lấy dữ liệu với phân trang
    $limit_res = select($limit_query, ["%{$frm_data['search']}%", "%{$frm_data['search']}%", "%{$frm_data['search']}%"], 'sss');

    $table_data = "";
    $total_rows = mysqli_num_rows($res);  // Số dòng dữ liệu

    if ($total_rows == 0) {
        // Nếu không có dữ liệu, trả về thông báo và phân trang rỗng
        echo json_encode(["table_data" => "<b>Không dữ liệu!</b>", "pagination" => ''], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $i = $start + 1;
    // Lặp qua dữ liệu trả về và hiển thị
    while ($data = mysqli_fetch_assoc($limit_res)) {
        $date = date("d-m-Y", strtotime($data['datetime']));
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        $status_bg = match ($data['booking_status']) {
            'booked' => 'bg-success',
            'cancelled' => 'bg-danger',
            default => 'bg-warning text-dark'
        };

        $table_data .= "
        <tr>
            <td>$i</td>
            <td>
                <span class='badge bg-primary'>Order ID: {$data['order_id']}</span><br>
                <b>Name : </b> {$data['user_name']}<br>
                <b>Phone : </b> {$data['phonenum']}
            </td>
            <td>
                <b>Room:</b> {$data['room_name']}<br>
                <b>Price:</b> VND{$data['price']}
            </td>
            <td>
                <b>Amount:</b> " . number_format($data['trans_amt'], 0, '', '.') . "VNĐ<br>
                <b>Date:</b> $date
            </td>
            <td>
                <span class='badge $status_bg'>{$data['booking_status']}</span>
            </td>
            <td>
                <button type='button' onclick='download({$data['booking_id']})' class=' btn btn-outline-success btn-sm fw-bold shadow-none'>                   
                  <i class='bi bi-file-earmark-arrow-down-fill'></i>
                </button>
            </td>
        </tr>";
        $i++;
    }

    // Logic phân trang
    $pagination = "";
    if ($total_rows > $limit) {
        $total_pages = ceil($total_rows / $limit);
        $disabled_prev = ($page == 1) ? "disabled" : "";
        $disabled_next = ($page == $total_pages) ? "disabled" : "";
        
        $prev = $page - 1;
        $next = $page + 1;

        //  "First"
        if ($page != 1) {
            $pagination .= "<li class='page-item'>
                <button onclick='change_page(1)' class='page-link shadow-none'>First</button>
            </li>";
        }

        //  "Prev"
        $pagination .= "<li class='page-item $disabled_prev'>
            <button onclick='change_page($prev)' class='page-link shadow-none'>Prev</button>
        </li>";

        //  "Next"
        $pagination .= "<li class='page-item $disabled_next'>
            <button onclick='change_page($next)' class='page-link shadow-none'>Next</button>
        </li>";

        //  "Last"
        if ($page != $total_pages) {
            $pagination .= "<li class='page-item'>
                <button onclick='change_page($total_pages)' class='page-link shadow-none'>Last</button>
            </li>";
        }
    }

    // Trả về dữ liệu và phân trang
    $output = json_encode(["table_data" => $table_data, "pagination" => $pagination], JSON_UNESCAPED_UNICODE);
    echo $output;
}
?>
