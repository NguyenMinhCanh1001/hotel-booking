function booking_analytics(period = 1)
{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/dashboard.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        let data=JSON.parse(this.responseText);
        document.getElementById('total_bookings').textContent = data.total_bookings
        document.getElementById('total_amt').textContent = Number(data.total_amt).toLocaleString('de-DE') + ' VNĐ';
        document.getElementById('active_bookings').textContent = data.active_bookings
        document.getElementById('active_amt').textContent = Number(data.active_amt).toLocaleString('de-DE') + ' VNĐ';
        document.getElementById('cancelled_bookings').textContent = data.cancelled_bookings
        document.getElementById('cancelled_amt').textContent = Number(data.cancelled_amt).toLocaleString('de-DE') + ' VNĐ';

        
    }
        xhr.send('booking_analytics&period=' + period); 
}

function user_analytics(period = 1)
{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/dashboard.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        let data=JSON.parse(this.responseText);
        document.getElementById('total_new_reg').textContent = data.total_new_reg;
    
        document.getElementById('total_queries').textContent = data.total_queries;

        document.getElementById('total_review').textContent = data.total_review;
      
        
        
        
        
    }
        xhr.send('user_analytics&period=' + period); 
}



window.onload = function()
{
    booking_analytics(); 
    user_analytics();
}