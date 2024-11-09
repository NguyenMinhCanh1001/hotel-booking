<?php 

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');
    require("../inc/PHPMailer/src/PHPMailer.php");
    require("../inc/PHPMailer/src/Exception.php");
    require("../inc/PHPMailer/src/SMTP.php");
    date_default_timezone_set("Asia/Vientiane");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($email_address, $token, $type) {
    $email = new PHPMailer(true);
    if($type == "email_confirmation"){
        $page = 'email_confirm.php';
        $subject = "Link xác minh tài khoản";
        $content = "xác nhận email của bạn";
    }
    else{
        $page = 'index.php';
        $subject = "Link đặt lại mật khẩu";
        $content = "khôi phục tài khoản của bạn";
    }
    try {
       
        $email->isSMTP();
        $email->Host       = 'smtp.gmail.com'; 
        $email->SMTPAuth   = true;
        $email->Username   = 'phamtuan7592@gmail.com'; 
        $email->Password   = 'dkdyqdslumwxjamn'; 
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port       = 587;

        
        $email->setFrom(SENDGRID_EMAIL,SENDGRID_NAME);
        $email->addAddress($email_address);

        
        $email->isHTML(true);
        $email->Subject = $subject;
        $email->Body    = 
        "Click vào link để $content: <br>
        <a href='".SITE_URL."$page?$type&email=$email_address&token=$token'>
            CLICK ME
        </a>";

        
        if ($email->send()) {
            return 1;  
        } else {
            return 0; 
        }
    } catch (Exception $e) {
        return 0;  
    }
}



    if(isset($_POST['register']))
    {
        $data = filteration($_POST);

        

        if($data['pass'] != $data['cpass']){
            echo 'pass_mismatch';
            exit;
        }

        //check user exists or not

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email`= ? OR `phonenum` = ? LIMIT 1", [$data['email'], $data['phonenum']], 'ss');

        if (mysqli_num_rows($u_exist) != 0) {
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        

        $img = uploadUserImage($_FILES['profile']);

        if($img == 'inv_img'){
            echo 'inv_img';
            exit;
        }
        else if($img =='upload_failed'){
            echo 'upload_failed';
            exit;
        }

        // send confirmation link to user's email
        $token = bin2hex(random_bytes(16));
        if(!send_mail($data['email'], $token,"email_confirmation")){
            echo "mail_failed";
            exit;
        }

        $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);

        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `token`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $values = [ $data['name'], $data['email'], $data['address'], $data['phonenum'], $data['pincode'], $data['dob'], $img, $enc_pass,$token];

        if (insert($query, $values, 'sssssssss')) {
            echo 1;
        } else {
            echo 'ins_failed!';
        }
    

    }

    if(isset($_POST['login']))
    {
       $data = filteration($_POST);

       $u_exist = select("SELECT * FROM `user_cred` WHERE `email`= ? OR `phonenum` = ? LIMIT 1", [$data['email_mob'], $data['email_mob']], 'ss');

        if (mysqli_num_rows($u_exist) == 0) {
            echo 'inv_email_mob';
        }
        else{
            $u_fetch = mysqli_fetch_assoc($u_exist);

            if($u_fetch['is_verified'] == 0){
                echo 'not_verified';
            }
            else if($u_fetch['status'] == 0){
                echo 'inactive';

            }
            else{
                if(!password_verify($data['pass'], $u_fetch['password'])){
                   echo 'invalid_pass';
                }
                else{
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['uId'] = $u_fetch['id'];
                    $_SESSION['uName'] = $u_fetch['name'];
                    $_SESSION['uPic'] = $u_fetch['profile'];
                    $_SESSION['uPhone'] = $u_fetch['phonenum'];
                    echo 1;
                }
            }
        }
        
           
    }

    if(isset($_POST['forgot_pass'])) {
        $data = filteration($_POST);
    
        $u_exist = select("SELECT * FROM `user_cred` WHERE `email`= ? LIMIT 1", [$data['email']], 's');
    
        if (mysqli_num_rows($u_exist) == 0) {
            echo 'inv_email';
        } else {
            $u_fetch = mysqli_fetch_assoc($u_exist);
    
            if ($u_fetch['is_verified'] == 0) {
                echo 'not_verified';
            } else if ($u_fetch['status'] == 0) {
                echo 'inactive';
            } else {
                
                $token = bin2hex(random_bytes(16));
    
                if (!send_mail($data['email'], $token, "account_recovery")) {
                    echo 'mail_failed';
                } else {
                    $data = date("Y-m-d");
    
                    $query = mysqli_query($con, "UPDATE `user_cred` SET `token`= '$token', `t_expire` = '$data' WHERE `id` = '$u_fetch[id]'");
    
                    if ($query) {
                        echo 1;
                    } else {
                        echo 'upd_failed';
                    }
                }
            }
        }
    }

    if(isset($_POST['recovery_user'])) {
        $data = filteration($_POST);

        $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

        $query= "UPDATE `user_cred` SET `password` = ?, `token` = ?, `t_expire` = ? WHERE `email` = ? AND `token` = ?";

        $values = [$enc_pass, null, null, $data['email'], $data['token']];

        if (update($query, $values, 'sssss')){
            echo 1; 
        }
        else{
            echo 'failed';  
        }
    }
    

?>