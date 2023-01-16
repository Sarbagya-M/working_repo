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
   function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	 }

   echo"$spot"; 


  // Connect to the MySQL database
  $conn = new mysqli($servername, $username, $password,$db);

  // Handle form submission
  
    // Get the requested spot location and check availability
   
    $sql = "SELECT availability FROM parking_spots WHERE spot_id = $spot   LIMIT 1";
	$result = $conn->query($sql);
 	 $row = $result->fetch_assoc();

  //  If a spot is available, make a reservation
    if ($row["availability"]== "reserved") {

      $nsql = "UPDATE parking_spots 
      SET availability = 'unavailable' 
      WHERE spot_id = $spot LIMIT 1";


      $nresult=$conn->query($nsql);
     // mysqli_query($conn, "INSERT INTO parking_spots (location, availability, reservation_details) VALUES ('$location', 'reserved', '$reservation_details')");
      echo 'Parking spot booked successfully!';
    } else {
      echo 'Sorry, that parking spot is not available.';
    }
	
  
  

  echo "<h1>".$row["availability"]."</h1>";
?>


