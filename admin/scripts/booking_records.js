function get_bookings(search= '', page = 1)
{
    
        
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/booking_records.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('table-data').innerHTML = this.responseText;
    }
        xhr.send('get_bookings&search=' + search + '&page=' +page); 
}

let assign_room_form= document.getElementById('assign_room_form');
function assign_room(id){
    assign_room_form.elements['booking_id'].value=id;
}






window.onload = function()
{
    get_bookings(); 
}