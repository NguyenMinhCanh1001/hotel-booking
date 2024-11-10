<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


if (isset($_POST['get_users'])) {
    $res = selectAll('user_cred');
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


if (isset($_POST['toggle_status']))
{
    $frm_data = filteration($_POST);

    $q = "UPDATE `user_cred` SET `status` = ? WHERE `id` = ?";
    $v = [$frm_data['value'], $frm_data['toggle_status']];
    
    if (update($q, $v, 'ii')) {
        echo 1; 
    } 
    else {
        echo 0; 
    }

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

if (isset($_POST['search_user'])) {
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