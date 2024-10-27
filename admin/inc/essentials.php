<?php
    
    // fontend purpose data
    define('SITE_URL','http://localhost:3000/');
    define('ABOUT_IMG_PATH',SITE_URL.'/images/GioiThieu/');

    // backend upload process need this data
    define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/hotel-booking/images/');
    define('ABOUT_FOLDER','GioiThieu/');

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
        // Các loại MIME hợp lệ
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];
    
        // Kiểm tra loại MIME
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; // Trả về 'inv_img' nếu loại không hợp lệ
        }
    
        // Kiểm tra kích thước file (tối đa 2MB)
        if (($image['size'] / (1024 * 1024)) > 2) {
            return 'inv_size'; // Trả về 'inv_size' nếu file quá lớn
        }
    
        // Lấy phần mở rộng của file
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        // Tạo tên file ngẫu nhiên
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
    
        // Đường dẫn đến file hình ảnh
        $img_path = UPLOAD_IMAGE_PATH . $folder . '/' . $rname; // Đảm bảo có dấu '/' giữa $folder và $rname
    
        // Di chuyển file vào thư mục đích
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname; // Trả về tên file nếu upload thành công
        } else {
            return 'upload_failed'; // Trả về 'upload_failed' nếu upload thất bại
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
?>