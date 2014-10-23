<?php
require_once('dbData.php');
 
$database = $_GET["database"];
 
// Create connection
$con = mysqli_connect($server, $user, $password, $database);
$stmt = "UPDATE sessions SET time = '5:30PM', location = 'THN E303', material = '8.1 - 8.4'  WHERE session_id = 4";

//$stmt = "INSERT INTO sessions (course_name, course, course_color, time, location, material, date) VALUES ('Calculus II', 'APMA1110', 'red', '6:30PM', 'Olsson 011', '8.1 - 8.4', '10/16/14')";
 
 echo $stmt;
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo mysqli_query($con, $stmt);
// Check if there are results
 
// Close connections
mysqli_close($con);
?>