var spot_1 = document.getElementById("button1");
var spot_2 = document.getElementById("button2");
var spot_3 = document.getElementById("button3");
var spot_4 = document.getElementById("button4");
var confirmReservation = document.getElementById("confirmReservation");

var spot = [spot_1,spot_2,spot_3,spot_4];
var position = 10;
var occupied =[0,0,0,0];

var payload = -3;

var index = 0;
var phpPos=-1;
var totalBookedSpots = [];

    


spot_1.onclick = function()
{
    bookingUi(0);
    set(0);
}
spot_2.onclick = function()
{
    bookingUi(1);
    set(1);
}
spot_3.onclick = function()
{
    bookingUi(2);
    set(2);
}
spot_4.onclick = function()
{
    bookingUi(3);
    set(3);
}
confirmReservation.onclick = function()
{
    bookingConfirmation();
}






function bookingUi (position)
{
    
    if(occupied[position] == 0)
    {
        occupied[position]=1;
        spot[position].style.backgroundColor="red";
        totalBookedSpots[position] = position;
        

    }
    else if(occupied[position] == 1)
    {
        occupied[position]=0;
        spot[position].style.backgroundColor="green";
        totalBookedSpots[position] = -1;
    } 
}









function set(position) {

    storeValue('myPageMode', position);
}

function storeValue(key, value) {
    if (localStorage) {
        localStorage.setItem(key, value);
    } else {
        $.cookies.set(key, value);
    }
}

function getStoredValue(key) {
    if (localStorage) {
        return localStorage.getItem(key);
    } else {
        return $.cookies.get(key);
    }
}










function bookingConfirmation()
{
    payload =getStoredValue ("myPageMode");
    window.location = "parkingBooking.php?spot="+payload+"&data="+occupied[position];
}
    
