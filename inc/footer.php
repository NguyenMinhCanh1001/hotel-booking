<div class="container-fluid bg-white mt-5">
  <div class="row">
    <div class="col-lg-4 p-4">
      <h3 class="merienda-header fs-3 mb-2"><?php echo $settings_r['site_title'] ?></h3>
      <p>
        <?php echo $settings_r['site_about'] ?>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis, excepturi laboriosam? Nulla ex, corporis quis dolores esse, totam nisi cum iusto odio aspernatur ipsa eos ducimus corrupti quod, quos suscipit.
      </p>
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Links</h5>
      <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Trang chủ</a><br>
      <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Phòng</a><br>
      <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Cơ sở vật chất</a><br>
      <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Liên hệ</a><br>
      <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">Giới thiệu</a><br>
      </div>
      <div class="col-lg-4 p-4">
        <h5 class="mb-3">Theo dõi chúng tôi trên</h5>
        <?php 
        if ($contact_r['tt'] != ''){
          echo <<< data
            <a href = "{$contact_r['tt']}" target="_blank" class="d-inline-block text-dark text-decoration-none mb-3 ">
                <i class="bi bi-tiktok"></i> TikTok
              </a>
            <br>
          data;
        }
        ?>
          <a href="<?php echo $contact_r['fb']; ?>"  target="_blank" class="d-inline-block text-dark text-decoration-none mb-3 ">
              <i class="bi bi-facebook me-l"></i> Facebook
          </a>
          <br>
            <a href="<?php echo $contact_r['insta']; ?>"  target="_blank" class="d-inline-block text-dark text-decoration-none mb-2 ">
              <i class="bi bi-instagram"></i> Instagram
          </a>
      </div>
  </div>
</div>



<h6 class="text-center bg-dark text-white p-3 m-0">NHÓM 3</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

function alert(type, msg, position = 'body') {
    let existingAlert = document.querySelector('.custom-alert');
    if (existingAlert) {
        let alertInstance = bootstrap.Alert.getOrCreateInstance(existingAlert);
        alertInstance.close();
    }


    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `<div class="alert ${bs_class} alert-dismissible fade show" role="alert">
                    <strong class="me-3">${msg}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;

    if (position == 'body') {
        document.body.append(element);
        element.classList.add('custom-alert');
    } 
    else {
        document.getElementById(position).appendChild(element);
    }

    setTimeout(() => {
        let alertToRemove = bootstrap.Alert.getOrCreateInstance(element.firstChild);
        alertToRemove.close();
        
        setTimeout(() => {
            if (element && element.parentNode) {
                element.remove();
            }
        }, 150);
    }, 3000);
}


  function setActivie(){
    let navbar = document.getElementById('nav-bar');
    let a_tags = navbar.getElementsByTagName('a');

    for(i = 0; i < a_tags.length; i++ ){
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];

      if(document.location.href.indexOf(file_name) >= 0){
        a_tags[i].classList.add('active');
      }
    }
  }

  let register_form = document.getElementById('register-form');
  
  register_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('name', register_form.elements['name'].value);
   
    data.append('email', register_form.elements['email'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    data.append('address', register_form.elements['address'].value);
    data.append('pincode', register_form.elements['pincode'].value);
    data.append('dob', register_form.elements['dob'].value); 
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    data.append('profile', register_form.elements['profile'].files[0]);
    data.append('register', '');


    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);

    xhr.onload = function() {
       if(this.responseText == 'pass_mismatch'){
        alert('error','Mật khẩu không khớp!')
       }
       else if(this.responseText == 'email_already'){
        alert('error','Email này đã được đăng kí!');
       }
       else if(this.responseText == 'phone_already'){
        alert('error','Số điện thoại này đã được đăng kí!');
       }
       else if(this.responseText == 'inv_img'){
        alert('error','Chỉ cho phép JPG, WEBP & PNG!');
       }
       else if(this.responseText == 'upload_failed'){
        alert('error','Tải hình ảnh lên không thành công!');
       }
       else if(this.responseText == 'mail_failed'){
        alert('error','không thể gửi email xác nhận! tải lên không thành công!');
       }
       else if(this.responseText == 'ins_failed'){
        alert('error','Đăng ký không thành công! Sever down!');
       }
       else{
        alert('success',"Đăng ký thành công. Liên kết xác nhận đã được gửi đến email!")
        register_form.reset();
       }
    }
        xhr.send(data); 




  });

  setActivie();
</script>