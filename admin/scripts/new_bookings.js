function get_bookings()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/new_bookings.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('table-data').innerHTML = this.responseText;
    }
        xhr.send('get_bookings'); 
}

let assign_room_form= document.getElementById('assign_room_form');
function assign_room(id){
    assign_room_form.elements['booking_id'].value=id;
}

assign_room_form.addEventListener('submit',function(e){
    e.preventDefault();

    let data = new FormData();
    data.append('room_no', assign_room_form.elements['room_no'].value);
    data.append('booking_id', assign_room_form.elements['booking_id'].value);
    data.append('assign_room','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/new_bookings.php", true);

    xhr.onload = function() {
        var myModal = document.getElementById('assign-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert('success', 'Room number Alloted! Booking Finalized');
            assign_room_form.reset();
            get_bookings();
        } else {
            alert('error', 'Server Down!');
        }

    }
    xhr.send(data);
});

function romve_users(user_id) {
    if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {  
    let data = new FormData();
    data.append('user_id', user_id);
    data.append('romve_users', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);

    xhr.onload = function() {
        if (this.responseText == 1) {
            alert('success', 'Phòng đã được xóa!');
            get_users();
        } else {
            alert('error', 'Xóa tài khoản không thành công!', 'image-alert');
        }
    }
    xhr.send(data);
}
}

function search_user(username){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('users-data').innerHTML = this.responseText;
    }
    xhr.send('search_user=true&name=' + encodeURIComponent(username));
 
}



window.onload = function()
{
    get_bookings(); 
}