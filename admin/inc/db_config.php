<?php 

    $hname ='localhost';
    $uname = 'root';
    $pass = '';
    $db = 'bookinghotel';
    
    $con = mysqli_connect($hname, $uname, $pass, $db);

    if(!$con){
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    function filteration($data){
        foreach($data as $key =>$value){
            trim();
            stripslashes();
            htmlspecialchars();
            strip_tags();
        }
    }
?>