<?php
    
    // fontend purpose data
    define('SITE_URL','http://localhost:3000/');
    define('ABOUT_IMG_PATH',SITE_URL.'images/GioiThieu/');
    define('CAROUSEL_IMG_PATH',SITE_URL.'images/carousel/');
    define('FACILITIES_IMG_PATH',SITE_URL.'images/facilities/');
    define('ROOMS_IMG_PATH',SITE_URL.'images/Phong/');
    define('USERS_IMG_PATH',SITE_URL.'images/users/');

    // backend upload process need this data
    define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/images/');
    define('ABOUT_FOLDER', 'GioiThieu/');
    define('CAROUSEL_FOLDER', 'carousel/');
    define('FACILITIES_FOLDER', 'facilities/');
    define('ROOMS_FOLDER', 'Phong/');
    define('USERS_FOLDER', 'users/');
    define('SENDGRID_EMAIL', 'phamtuan7592@gmail.com');
    define('SENDGRID_NAME', 'Tuandeptra');

    
    function adminLogin()
    {
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true))
        {
            echo"<script>
                window.location.href='index.php';
            </script>
        ";
            exit;
        }
        
    }

    function redirect($url)
    {
        echo"<script>
                window.location.href='$url';
            </script>";
            exit;
    }

    function alert($type, $msg)
    {
        $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

        echo <<<alert
                <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                    <strong class="me-3">$msg</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            alert;
    }

    function uploadImage($image, $folder) {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];
    
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img';
        } else if (($image['size'] / (1024 * 1024)) > 6) {
            return 'inv_size';
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
            
            
            $img_path = UPLOAD_IMAGE_PATH . $folder;
    
            
            if (!is_dir($img_path)) {
                mkdir($img_path, 0777, true); 
            }
    
            $img_path .= $rname; 
    
            if (move_uploaded_file($image['tmp_name'], $img_path)) {
                return $rname;
            } else {
                return 'upload_failed';
            }
        }
    }
    

    function deleteImage($image, $folder){
        if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
            return true;
        }
        else{ 
            return false;
        }
    }

    function uploadSVGImage($image, $folder) {
        $valid_mime = ['image/svg+xml'];
        $img_mime = $image['type'];
    
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img';
        } else if (($image['size'] / (1024 * 1024)) > 1) {
            return 'inv_size';
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
            
            
            $img_path = UPLOAD_IMAGE_PATH . $folder;
    
            
            if (!is_dir($img_path)) {
                mkdir($img_path, 0777, true); 
            }
    
            $img_path .= $rname; 
    
            if (move_uploaded_file($image['tmp_name'], $img_path)) {
                return $rname;
            } else {
                return 'upload_failed';
            }
        }
    }

    function uploadUserImage($image){
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];
    
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img';
        } 
    
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
        
        $img_path = UPLOAD_IMAGE_PATH . USERS_FOLDER;
    
        if (!is_dir($img_path)) {
            mkdir($img_path, 0777, true); 
        }
    
        $img_path .= $rname;
    
        if ($ext === 'png' || $ext === 'PNG') {
            $img = imagecreatefrompng($image['tmp_name']);
        }
         else if ($ext === 'webp' || $ext === 'WEBP') {
            $img = imagecreatefromwebp($image['tmp_name']);
        } 
        else {
            $img = imagecreatefromjpeg($image['tmp_name']);
        }
    
        if (imagejpeg($img, $img_path, 75)) {
            imagedestroy($img); 
            return $rname;
        } else {
            imagedestroy($img); 
            return 'upload_failed';
        }
    }
    
?>