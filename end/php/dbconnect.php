<?php


$conn = mysqli_connect("localhost", "root", "root", "webdevcourse");

$nameres = $_POST['nameres'];
$day = new DateTime($_POST['startres']);
$endres = new DateTime($_POST['endres']);

while ($day < $endres){
  $dateToInsert = $day->format('Y-m-d');
  $conn->query(
    "INSERT INTO `reservations` (`name`, `date`) VALUES ('$nameres', '$dateToInsert');"
  );
  $day->add(new DateInterval('P1D'));
}

         
if(mysqli_query($conn, $sql)){
    echo "<h3>data stored in a database successfully." 
    . " Please browse your localhost php my admin" 
    . " to view the updated data</h3>"; 
  
    echo nl2br("\n$first_name\n $last_name\n "
    . "$gender\n $address\n $email");
} 
else{
    echo "ERROR: Hush! Sorry $sql. " 
    . mysqli_error($conn);
  }
          
    // Close connection
mysqli_close($conn);
?>
        