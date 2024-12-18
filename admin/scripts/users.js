function get_users()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('users-data').innerHTML = this.responseText;
    }
        xhr.send('get_users'); 
}


function toggle_status(id, val) 
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.responseText == 1) {
            alert('success', 'Trạng thái đã được chuyển đổi!');
        
            get_users(); 
        } else {
            alert('error', 'Server đã đóng!');
        }
    }
    xhr.send('toggle_status=' + id + '&value=' + val);
}


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
    get_users(); 
}