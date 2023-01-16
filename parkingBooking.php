<!DOCTYPE html>
<html>
	
<head>
	<title>
		Parking booking
	</title>
    <style>
            /* .button
            {
                margin: 10px;
                width: 100px;
                height: 150px;
                background-color: green;
                border: none;
            
            }

            .button:hover
            {
                background-color: rgb(32, 113, 15);
                
            }
			 */
       
        
        </style>
        
        

</head>

<body style="text-align:center;" color>



<?php



   //server ra database connect garna vaiables ma rakheko
   $servername = "localhost";
   $username = "root";
   $password = "";
   $db = "parking booking data";  //database name
   $spot = -1;



   if ($_SERVER["REQUEST_METHOD"] == "GET") 
   {
	   $spot = test_input($_GET["spot"]);
	   $data=test_input($_GET["data"]);
	   
   }
   else 
   {

   }
   function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	 }




  // Connect to the MySQL database
  $conn = new mysqli($servername, $username, $password,$db);

  // Handle form submission
  
    // Get the requested spot location and check availability
   
    $sql = "SELECT  availability FROM parking_spots WHERE spot_id = '$spot'  LIMIT 1";
	  $result = $conn->query($sql);
 	  $row = $result->fetch_assoc();

  //  If a spot is available, make a reservation

    if ($row["availability"]== "available") {
      $nsql = "UPDATE parking_spots
               SET availability = 'reserved' 
               WHERE spot_id = '$spot' LIMIT 1";

      $nresult=$conn->query($nsql);
     // mysqli_query($conn, "INSERT INTO parking_spots (location, availability, reservation_details) VALUES ('$location', 'reserved', '$reservation_details')");
      echo 'Parking spot reserved successfully!';
    } else {
      echo 'Sorry, that parking spot is not available.';
    }
	
  
  

  //echo "<var>spoth=$spot</var>";
?>


















	<form method="post" action="parkingBooking.php" >
		<input type="button"  id="button1"
				class="button" value="asdfasdf" />
		
		<input type="button"  id = "button2"
				class="button" value="Button2" />
        
        <input type="button" id = "button3"
                 class="button" value="Button3" />
		
		<input type="button" id = "button4"
				class="button" value="Button4" />


		
	</form>



  <form method="post" action="parkingBooking.php" >
		<input type="button"  id="confirmReservation"
				class="button" value="confirm" />
		
	
	</form>



	 <script src='js files/bookingJs.js'></script> 
</body>

</html>
