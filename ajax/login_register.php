<?php 

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');
    require("../inc/PHPMailer/src/PHPMailer.php");
    require("../inc/PHPMailer/src/Exception.php");
    require("../inc/PHPMailer/src/SMTP.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($email_address, $name, $token) {
    $email = new PHPMailer(true);
    
    try {
       
        $email->isSMTP();
        $email->Host       = 'smtp.gmail.com'; 
        $email->SMTPAuth   = true;
        $email->Username   = 'phamtuan7592@gmail.com'; 
        $email->Password   = 'dkdyqdslumwxjamn'; 
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port       = 587;

        
        $email->setFrom('phamtuan7592@gmail.com');
        $email->addAddress($email_address, $name);

        
        $email->isHTML(true);
        $email->Subject = "Xác nhận tài khoản";
        $email->Body    = 
        "Click vào link để xác nhận tài khoản: <br>
        <a href='".SITE_URL."email_confirm.php?email_confirmation&email=$email_address&token=$token'>
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
        if(!send_mail($data['email'], $data['name'], $token)){
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
?>