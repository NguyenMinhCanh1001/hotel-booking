<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Liên hệ</title>
    

</head>

<body class="bg-light">
    <?php require('inc/header.php')?>

    <div class="my-5 px-4">
        <h2 class="merienda-header text-center ">Liên hệ với khách sạn</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Đội ngũ nhân viên của khách sạn luôn sẵn sàng phục vụ bạn 24/7. Hãy để chúng tôi đồng hành cùng bạn trong mọi hành trình và mang đến những trải nghiệm tuyệt vời nhất!<br>
            Nếu bạn cần đặt phòng hoặc có bất kỳ thắc mắc nào, đừng ngần ngại liên hệ với chúng tôi qua các kênh sau
        </p>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe'] ?>"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <h5>Địa chỉ</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank"
                        class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-compass"></i> <?php echo $contact_r['address'] ?>
                    </a>

                    <h5 class="mt-4">Số liên hệ</h5>
                    <a href="tel: <?php echo $contact_r['pn1'] ?>"
                        class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone"></i>
                        <?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>

                    <?php 
              if ($contact_r['pn2'] != '') {
                  echo <<<data
                      <a href="tel:{$contact_r['pn2']}" class="d-inline-block text-decoration-none text-dark">
                          <i class="bi bi-telephone"></i> {$contact_r['pn2']}
                      </a>
                  data;
              }
            ?>
                    <h5 class="mt-4">Email khách sạn</h5>
                    <a href="mailto: <?php echo $contact_r['email'] ?>"
                        class="d-inline-block text-decoration-none text-dark"><i class="bi bi-envelope"></i>
                        <?php echo $contact_r['email'] ?></a>

                    <h5 class="mt-4">Theo dõi chúng tôi trên</h5>
                    <?php
          if ($contact_r['tt'] != '') {
            echo <<< data
              <a href="{$contact_r['tt']}" target="_blank" class="d-inline-block mb-2 text-dark fs-5 me-2 text-decoration-none ">
                <i class="bi bi-tiktok"></i>
            </a>
            data;
          }
          ?>
                    <a href="<?php echo $contact_r['fb']; ?>" target="_blank"
                        class="d-inline-block mb-2 text-dark fs-5 me-2 text-decoration-none ">
                        <i class="bi bi-facebook me-l"></i>
                    </a>

                    <a href="<?php echo $contact_r['insta']; ?>" target="_blank"
                        class="d-inline-block mb-2 text-dark fs-5 text-decoration-none">
                        <i class="bi bi-instagram"></i>
                    </a>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Gửi tin nhắn</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Tên Khách hàng</label>
                            <input name="name" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Vấn đề</label>
                            <input name="subject" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Nhắn tin</label>
                            <textarea name="massage" required class="form-control shadow-none" rows="5"
                                style="resize: none;"></textarea>
                        </div>
                        <button type="submit" name="send" class="btn text-white custom-bg mt-3">
                            Gửi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
  if(isset($_POST['send']))
  {
    $frm_data = filteration($_POST);
    
    $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `massage`) VALUES (?,?,?,?)";
    $values=[$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['massage']];

    $res = insert($q,$values,'ssss');
    if($res==1){
      alert('success','Mail sent!');
    }
    else{
      alert('error','Server Down! Try again later.');
    }
  }
?>


    <?php require('inc/footer.php')?>

</body>

</html>