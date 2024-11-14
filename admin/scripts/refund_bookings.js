function get_bookings(search= '')
{
    

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/refund_bookings.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('table-data').innerHTML = this.responseText;
    }
        xhr.send('get_bookings&search=' + search); 
}


function refund_booking(id){
    if (confirm("Bạn muốn hoàn tiền cho lần đặt phòng này?")) {  
        let data = new FormData();
        data.append('booking_id', id);
        data.append('refund_booking', '');
    
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/refund_bookings.php", true);
    
        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success', 'Tiền đã được hoàn lại!');
                get_bookings();
            } else {
                alert('error', 'Server Down!', 'image-alert');
            }
        }
            xhr.send(data);
        }
}



window.onload = function()
{
    get_bookings(); 
}