<div class="container-fluid bg-white mt-5">
  <div class="row">
    <div class="col-lg-4 p-4">
      <h3 class="merienda-header fs-3 mb-2"> UTH HOTEL</h3>
      <p>
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
  setActivie();
</script>