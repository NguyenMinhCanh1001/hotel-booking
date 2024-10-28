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
        foreach($data as $key => $value){
            $value = trim($value);
            $value = stripcslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $data[$key] =  $value;
        }
        return $data;
    }

    function selectAll($table)
    {
       $con = $GLOBALS['con'];
       $res =  mysqli_query($con, "SELECT * FROM $table");
       if (!$res) {
        die("Truy vấn không thành công: " . mysqli_error($con));
    }
       return $res;

    }  

    function select($sql, $values, $datatypes){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt, $datatypes,...$values);
                if(mysqli_stmt_execute($stmt))
                {
                    $res = mysqli_stmt_get_result($stmt);
                    mysqli_stmt_close($stmt);
                    return $res;
                }
                else{
                    mysqli_stmt_close($stmt);
                    die("Truy vấn không thể thực hiện được");
                }
        }
        else{
            die("Truy vấn không thể thực hiện được");
        }
    }
    function update($sql, $values, $datatypes){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt, $datatypes,...$values);
                if(mysqli_stmt_execute($stmt))
                {
                    $res = mysqli_stmt_affected_rows($stmt);
                    return $res;
                }
                else{
                    mysqli_stmt_close($stmt);
                    die("Cập nhật không thể thực hiện được");
                }
        }
        else{
            die("Cập nhật không thể thực hiện được");
        }
    }


    function insert($sql, $values, $datatypes){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt, $datatypes,...$values);
                if(mysqli_stmt_execute($stmt))
                {
                    $res = mysqli_stmt_affected_rows($stmt);
                    mysqli_stmt_close($stmt);
                    return $res;
                }
                else{
                    mysqli_stmt_close($stmt);
                    die("Query cannot be executed - Insert");
                }
        }
        else{
            die("Query cannot be prepared - Insert");
        }
    }

    function delete($sql, $values, $datatypes){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt, $datatypes,...$values);
                if(mysqli_stmt_execute($stmt))
                {
                    $res = mysqli_stmt_affected_rows($stmt);
                    mysqli_stmt_close($stmt);
                    return $res;
                }
                else{
                    mysqli_stmt_close($stmt);
                    die("Query cannot be executed - Delete ");
                }
        }
        else{
            die("Query cannot be executed - Delete");
        }
    }

?>