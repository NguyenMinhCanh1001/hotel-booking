let add_room_form = document.getElementById('add_room_form');

add_room_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_rooms();
});


function add_rooms() 
{
    let data = new FormData();
    data.append('add_room', '');
    data.append('name', add_room_form.elements['name'].value);
    data.append('area', add_room_form.elements['area'].value);
    data.append('price', add_room_form.elements['price'].value);
    data.append('quantity', add_room_form.elements['quantity'].value);
    data.append('adult', add_room_form.elements['adult'].value);
    data.append('children', add_room_form.elements['children'].value);
    data.append('desc', add_room_form.elements['desc'].value);


    let features = [];
    add_room_form.elements['features'].forEach(el => {
        if (el.checked) {
            features.push(el.value);
    }
});

let facilities = [];

    add_room_form.elements['facilities'].forEach(el => {
        if (el.checked) {
            facilities.push(el.value);
        }
});


data.append('features', JSON.stringify(features));
data.append('facilities', JSON.stringify(facilities));

let xhr = new XMLHttpRequest();
xhr.open("POST", "ajax/rooms.php", true);

xhr.onload = function() {
    var myModal = document.getElementById('add_room');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
        alert('success', 'Phòng mới đã được thêm!');
        add_room_form.reset();
        get_all_rooms();
    } else {
        alert('error', 'Server Down!');
    }
}
xhr.send(data);
}

function get_all_rooms()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('room-data').innerHTML = this.responseText;
    }
        xhr.send('get_all_rooms'); 
}


let edit_room_form = document.getElementById('edit_room_form');

function edit_details(id) 
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        
        let data = JSON.parse(this.responseText);
        
        edit_room_form.elements['name'].value = data.roomdata.name;
        edit_room_form.elements['area'].value = data.roomdata.area;
        edit_room_form.elements['price'].value = data.roomdata.price;
        edit_room_form.elements['quantity'].value = data.roomdata.quantity;
        edit_room_form.elements['adult'].value = data.roomdata.adult;
        edit_room_form.elements['children'].value = data.roomdata.children;
        edit_room_form.elements['desc'].value = data.roomdata.description;
        edit_room_form.elements['room_id'].value = data.roomdata.id;

        edit_room_form.elements['facilities'].forEach(el => {
        if (data.facilities.includes(Number(el.value))) {
            el.checked = true;
        }
    });

        edit_room_form.elements['features'].forEach(el => {
            if (data.features.includes(Number(el.value))) {
                el.checked = true;
            }
        });
        
        
    }
    xhr.send('get_room=' + id);
}

edit_room_form.addEventListener('submit', function(e) {
    e.preventDefault();
    submit_edit_rooms();
});

function submit_edit_rooms() 
{
    let data = new FormData();
    data.append('edit_room', '');
    data.append('room_id', edit_room_form.elements['room_id'].value);
    data.append('name', edit_room_form.elements['name'].value);
    data.append('area', edit_room_form.elements['area'].value);
    data.append('price', edit_room_form.elements['price'].value);
    data.append('quantity', edit_room_form.elements['quantity'].value);
    data.append('adult', edit_room_form.elements['adult'].value);
    data.append('children', edit_room_form.elements['children'].value);
    data.append('desc', edit_room_form.elements['desc'].value);


    let features = [];
    edit_room_form.elements['features'].forEach(el => {
        if (el.checked) {
            features.push(el.value);
        }
    });

    let facilities = [];
    
    edit_room_form.elements['facilities'].forEach(el => {
        if (el.checked) {
            facilities.push(el.value);
        }
    });


    data.append('features', JSON.stringify(features));
    data.append('facilities', JSON.stringify(facilities));

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);
    

    xhr.onload = function() {
    

    if (this.responseText == 1) {
        var myModal = document.getElementById('edit_room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        alert('success', 'Dữ liệu phòng đã chỉnh sửa!');
        edit_room_form.reset();
        get_all_rooms();
        } 
    else {
        alert('error', 'Server Down!');
        }
    }
    xhr.send(data);
}

function toggle_status(id, val) 
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.responseText == 1) {
            alert('success', 'Trạng thái đã được chuyển đổi!');
        
            get_all_rooms(); 
        } else {
            alert('error', 'Server đã đóng!');
        }
    }
    xhr.send('toggle_status=' + id + '&value=' + val);
}

    let add_image_form = document.getElementById('add_image_form')

    add_image_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_image();
    });

function add_image()
{
    let data = new FormData();
    data.append('image', add_image_form.elements['image'].files[0]);
    data.append('room_id', add_image_form.elements['room_id'].value);
    data.append('add_image', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);

    xhr.onload = function() 
    {

        if (this.responseText == 'inv_img') {
            alert('error', 'Chỉ cho phép hình ảnh JPG, WEBP hoặc PNG!', 'image-alert');
        } else if (this.responseText == 'inv_size') {
            alert('error', 'Hình ảnh phải nhỏ hơn 2MB!', 'image-alert');
        } else if (this.responseText == 'upd_failed') {
            alert('error', 'Tải hình ảnh lên không thành công. Máy chủ ngừng hoạt động!', 'image-alert');
        } else {
            alert('success', 'Ảnh mới đã được thêm vào!','image-alert'); 
            room_images(add_image_form.elements['room_id'].value,document.querySelector("#room_images .modal-title").innerHTML);   
            add_image_form.reset();
        }
    }
    xhr.send(data);
}

function room_images(id,rname)
{
    document.querySelector("#room_images .modal-title").innerHTML = rname;
    add_image_form.elements['room_id'].value = id;
    add_image_form.elements['image'].value = '';

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('room-image-data').innerHTML = this.responseText;
    }
    xhr.send('get_room_images=' + id);
      
}

function rem_image(img_id,room_id)
{
    let data = new FormData();
    data.append('image_id', img_id);
    data.append('room_id', room_id);
    data.append('rem_image', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);

    xhr.onload = function() 
    {

        if (this.responseText == 1) {
            alert('success', 'Ảnh đã được xóa!','image-alert');
            room_images(room_id, document.querySelector("#room_images .modal-title").innerHTML);   
        }
        else {
            alert('error', 'Không xóa ảnh được!','image-alert');
           
        }
    }
    xhr.send(data); 
}

function thumb_image(img_id,room_id)
{
    let data = new FormData();
    data.append('image_id', img_id);
    data.append('room_id', room_id);
    data.append('thumb_image', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);

    xhr.onload = function() 
    {

        if (this.responseText == 1) {
            alert('success', 'Ảnh thumbnail đã thay đổi!','image-alert');
            room_images(room_id, document.querySelector("#room_images .modal-title").innerHTML);   
        }
        else {
            alert('error', 'Cập nhật thumbnail không thành công !','image-alert');
           
        }
    }
    xhr.send(data); 
}

function romve_room(room_id) {
    if (confirm("Bạn có chắc chắn muốn xóa phòng này không?")) {  
    let data = new FormData();
    data.append('room_id', room_id);
    data.append('romve_room', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);

    xhr.onload = function() {
        if (this.responseText == 1) {
            alert('success', 'Phòng đã được xóa!');
            get_all_rooms();
        } else {
            alert('error', 'Xóa phòng không thành công!', 'image-alert');
        }
    }
    xhr.send(data);
}
}



window.onload = function()
{
    get_all_rooms(); 
}