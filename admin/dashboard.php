<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển quản trị</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-white">

    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between ">
        <h3>Bảng điều khiển quản trị</h3>
        <a href="logout.php" class="btn btn-light btn-sm poppins-medium">Đăng xuất</a>
    </div>



    <?php require('inc/scripts.php'); ?>
</body>
</html>