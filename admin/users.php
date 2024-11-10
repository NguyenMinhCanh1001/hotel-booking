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
    <title>Khách hàng</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-white">

    <?php require('inc/header.php');?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Khách hàng</h3>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Nhập để tìm kiếm...">
                        </div>

                        <div class="table-responsive">
                            <table class=" table table-hover border text-center" style="min-width: 1300px;" >
                                <thead>
                                    <tr class="bg-dark text-light" >
                                        <th scope="col">#</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Ngày sinh</th>
                                        <th scope="col">Xác minh</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Ngày đăng ký</th>
                                        <th scope="col">Yêu cầu</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>








    

    <?php require('inc/scripts.php'); ?>

    <script src="scripts/users.js"> </script>

</body>

</html>