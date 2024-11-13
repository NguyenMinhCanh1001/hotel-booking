<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if(isset($_GET['seen']))
    {
        $frm_data = filteration($_GET);
        
        if($frm_data['seen'] == 'all'){
            $q="UPDATE `user_queries` SET `seen`=?";
            $values = [1];
            if(update($q,$values,'i')){
                alert('success','Mark as read');
            }
            else{
                alert('error','Operation Failed');
            }
            
        }
        else{
            $q="UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
            $values = [1,$frm_data['seen']];
            if(update($q,$values,'ii')){
                alert('success','Mark as read');
            }
            else{
                alert('error','Operation Failed');
            }
            
        }
        
    }

    if(isset($_GET['del']))
    {
        $frm_data=filteration($_GET);
        
        if($frm_data['del'] == 'all'){
            $q="DELETE FROM `user_queries`";
           
            if(mysqli_query($con,$q)){
                alert('success','All data deleted!');
            }
            else{
                alert('error','Operation Failed');
            }
            
        }
        else{
            $q="DELETE FROM `user_queries` WHERE `sr_no`=?";
            $values = [$frm_data['del']];
            if(delete($q,$values,'i')){
                alert('success','Data deleted!');
            }
            else{
                alert('error','Operation Failed');
            }
            
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">;
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng mới</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-white">

    <?php require('inc/header.php');?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Đặt phòng mới</h3>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Nhập để tìm kiếm...">
                        </div>

                        <div class="table-responsive">
                            <table class=" table table-hover border" >
                                <thead>
                                    <tr class="bg-dark text-light" >
                                        <th scope="col">#</th>
                                        <th scope="col">Chi tiết khách hàng</th>
                                        <th scope="col">chi tiết phòng</th>
                                        <th scope="col">Chi tiết đặt phòng</th>
                                        <th scope="col">Yêu cầu</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


 <!-- Assign Room Number  modal-->
 <div class=" modal fade" id="assign-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="assign_room_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Assign Room</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold ">Số phòng </label>
                                        <input type="text" name="room_no" class="form-control shadow-none" required>
                                    </div>
                                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                                         Chú ý:assign room number only when user has been arrived!
                                    </span>
                                    <input type="hidden" name="booking_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn text-secondary shadow-none"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Assign</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





    

    <?php require('inc/scripts.php'); ?>

    <script src="scripts/new_bookings.js"> </script> 

</body>

</html>