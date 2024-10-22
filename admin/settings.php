<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>settings</title>
      <?php require('inc/links.php'); ?>
  </head>
  <body class="bg-white">

      <?php require('inc/header.php');?>

      <div class="container-fluid" id="main-content">
        <div class="row">
          <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4"> Cài đặt</h3>
          <!-- general settings section-->
          <!-- phần cài đặt chung-->

            <div class="card border-0 shadow mb-4" >
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="card-title m-0">Cài đặt chung</h5>
                <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                <i class="bi bi-pencil-square"></i> Chỉnh sửa
                </button>         
              </div>
              
              <h6 class="card-subtitle mb-1 fw-bold">Tiêu đề</h6>
              <p class="card-text" id="site_title"></p>
              <h6 class="card-subtitle mb-1 fw-bold">Giới thiệu về khách sạn</h6>
              <p class="card-text" id="site_about"></p>
            </div>
          </div>
          
          <!-- general settings modal-->
           <!-- chi tiết cài đặt chung-->
          <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form id="general_s_form">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" >Cài đặt chung</h5>               
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label fw-bold ">Tiêu đề </label>
                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required >
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Giới thiệu về khách sạn</label>
                    <textarea name="site_about"  id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn custom-bg text-white shadow-none">Đồng ý</button>
                </div>
              </div>
              </form>             
            </div>
          </div>

          <!-- shutdown section-->
           <!--Đóng trang web-->
          <div class="card border-0 shadow-sm" >
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="card-title m-0">Đóng trang web</h5>
                <div class="form-check form-switch">
                  <form>
                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                  </form>
                </div>  
              </div>
              <p class="card-text">
                  content
              </p>
            </div>
          </div>

          <!-- contact details modal-->
          <!-- Chi tiết phần liên lạc -->
          <div class="card border-0 shadow mb-4" >
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="card-title m-0">Cài đặt liên hệ</h5>
                <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                <i class="bi bi-pencil-square"></i> Chỉnh sửa
                </button>         
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Điạ chỉ</h6>
                    <p class="card-text" id="address"></p>
                  </div>
                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                    <p class="card-text" id="gmap"></p>
                  </div>
                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Số điện thoại</h6>
                    <p class="card-text mb-1"><i class="bi bi-telephone"></i>
                    <span id="pn1"></span>
                   </p>
                   <p class="card-text"><i class="bi bi-telephone"></i>
                    <span id="pn2"></span>
                   </p>
                  </div>
                  <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                    <p class="card-text" id="email"></p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                      <h6 class="card-subtitle mb-1 fw-bold">Link mạng xã hội</h6>
                      <p class="card-text mb-1"><i class="bi bi-facebook me-l"></i>
                      <span id="fb"></span>
                    </p>
                    <p class="card-text"><i class="bi bi-tiktok"></i>
                      <span id="tt"></span>
                    </p>
                    <p class="card-text"><i class="bi bi-instagram"></i>
                      <span id="insta"></span>
                    </p>
                  </div>
                  <div class="mb-4">
                      <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                      <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                  </div>
                </div>
              </div>
             
              
            </div>
          </div>


          </div>
        </div>
      </div>

      <?php require('inc/scripts.php'); ?>
      <script>
        let general_data,  contacts_data;

        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        function get_general()
        {
          let site_title = document.getElementById('site_title');
          let site_about = document.getElementById('site_about');         

          let shutdown_toggle =document.getElementById('shutdown-toggle');
          let xhr=new XMLHttpRequest();
          xhr.open("POST","ajax/settings_crud.php",true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          xhr.onload = function(){
          general_data = JSON.parse(this.responseText); 
          site_title.innerText = general_data.site_title ;
          site_about.innerText = general_data.site_about ;  
            
          site_title_inp.value = general_data.site_title;
          site_about_inp.value = general_data.site_about;
          if(general_data.shutdown ==0){
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
          }else{
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
          }
          }
          xhr.send('get_general');
        }
        
        general_s_form.addEventListener('submit',function(e){
          e.preventDefault();
          upd_general(site_title_inp.value, site_about_inp.value)
        });

        function upd_general(site_title_val, site_about_val){
          let xhr=new XMLHttpRequest();
          xhr.open("POST","ajax/settings_crud.php",true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          xhr.onload = function(){
           
            var myModal = document.getElementById('general-s');
            var modal = bootstrap.Modal.getInstance(myModal);            
            modal.hide();
            if(this.responseText == 1){
             alert('success','Lưu thành công!');
               get_general();
             }
             else
             {
              alert('error','Không có thay đổi!');
             }              
          }
          xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
        }
        function upd_shutdown(val){
          let xhr=new XMLHttpRequest();
          xhr.open("POST","ajax/settings_crud.php",true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          xhr.onload = function(){          
            if(this.responseText == 1 && general_data.shutdown==0)
             {
              alert('success','trang web đã bị đóng!');
             }
             else
             {
               alert('success','trang web đã mở!');
            }  
             get_general(); 
            }
            xhr.send('upd_shutdown='+val);           
        }


        function get_contacts()
        {
          let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'tt', 'insta']
          let iframe = document.getElementById('iframe');

          let xhr=new XMLHttpRequest();
          xhr.open("POST","ajax/settings_crud.php",true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          xhr.onload = function(){
            contacts_data = JSON.parse(this.responseText); 
            console.log(contacts_data);
          }
          xhr.send('get_contacts');
        }

        window.onload = function(){
          get_general();
          get_contacts();
        }
      </script> 
  </body>
</html>