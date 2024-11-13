<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


if (isset($_POST['get_bookings'])) {
    $query="SELECT bo.*, bd.* FROM `booking_order` bo
         INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
         WHERE bo.booking_status = 'booked' AND bo.arrival = 0 ORDER BY bo.booking_id ASC";
     $res = mysqli_query($con, $query);
     $i = 1;
     $table_data = "";
     while ($data = mysqli_fetch_assoc($res)) {
         $date = date("d-m-Y", strtotime($data['datetime']));
         $checkin = date("d-m-Y", strtotime($data['check_in']));
         $checkout = date("d-m-Y", strtotime($data['check_out']));
 
         $table_data .= "
         <tr>
             <td>$i</td>
             <td>
                 <span class='badge bg-primary'>
                 Order ID: {$data['order_id']}
                 </span>
                 <br>
                 <b>Name : </b> {$data['user_name']}
                 <br>
                 <b>Phone : </b> {$data['phonenum']}
             </td>
             <td>
                 <b>Room:</b> {$data['room_name']}
                 <br>
                 <b>Price:</b> VND{$data['price']}
             </td>
              <td>
                 <b>Check in:</b> $checkin
                 <br>
                 <b>Check out:</b> $checkout
                 <br>
                 <b>Paid:</b> {$data['trans_amt']}
                 <br>
                  <b>Date:</b> $date
             </td>
              <td>
                <button type='button' onclick='assign_room($data[booking_id])' class='btn text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                    <i class='bi bi-check2-square'></i>Assign room
                </button> 
                <br>   
                <button type='button' class='mb-2 btn btn-outline-danger btn-sm fw-bold shadow-none'>
                    <i class='bi bi-trash'></i>Cancel Booking
                </button>
             </td>
         </tr>
         ";
        $i++;

    }
    echo $table_data;
}


if (isset($_POST['assign_room'])){
    $frm_data = filteration($_POST);

    $query = "UPDATE `booking_order` bo INNER JOIN `booking_details` bd
        ON bo.booking_id = bo.booking_id
        SET bo.arrival = ?, bd.room_no = ?
        WHERE bo.booking_id = ? ";

    $values = [1, $frm_data['room_no'],$frm_data['booking_id']];
    $res = update($query,$values,'sii');
    echo ($res==2) ? 1 : 0;
}


if (isset($_POST['romve_users'])) {
    $frm_data = filteration($_POST);



    $res = delete("DELETE FROM `user_cred` WHERE `id` = ? AND `is_verified` = ?", [$frm_data['user_id'], 0], 'ii');

    

    if($res){
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['search_user'])) 
{
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";

    $searchTerm = "%" . $frm_data['name'] . "%"; 

    $res = select($query, [$searchTerm], 's');  
    $i = 1;
    $path = USERS_IMG_PATH;

    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {

        $del_btn = "<button type='button' onclick='romve_users($row[id])' class='btn btn-danger shadow-none btn-sm'>
                        <i class='bi bi-trash'></i>
                    </button>";
        $verified = "<span class='badge bg-warning'><i class='bi bi-person-fill-x fs-4'></i></span>";

        if ($row['is_verified']) {
            $verified = "<span class='badge bg-success'><i class='bi bi-person-fill-check fs-4'></i></span>";
            $del_btn = "";
        }

        $status = "<button onclick='toggle_status($row[id], 0)' class='btn btn-primary btn-sm shadow-none'>Hoạt động</button>";

        if (!$row['status']) {
            $status = "<button onclick='toggle_status($row[id], 1)' class='btn btn-danger btn-sm shadow-none'>Bị khóa</button>";
        }

        $date = date("d-m-Y", strtotime($row['datetime']));


        $data .= "
            <tr>
                <td>$i</td>
                <td>
                    <img src='$path$row[profile]' width='55px'>
                    <br/>
                    $row[name]
                </td>
                <td>$row[email]</td>
                <td>$row[phonenum]</td>
                <td>$row[address] | $row[pincode]</td>
                <td>$row[dob]</td>
                <td>$verified</td>
                <td>$status</td>
                <td>$date</td>
                <td>$del_btn</td>
            </tr>
        "; 
        $i++;
    }
    echo $data;
}





?>