<?php
require_once('dbData.php');
 
$database = $_GET["database"];
 
// Create connection
$con = mysqli_connect($server, $user, $password, $database);
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = $_GET["query"];

// Check if there are results
if ($result = mysqli_query($con, $sql))
{

	// If so, then create a results array and a temporary one
    // to hold the data
    $resultArray = array();
    $tempArray = array();



try
{	
    // Loop through each row in the result set
    while($row = $result->fetch_object())
    {
        // Add each row into our results array
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }
 
    // Finally, encode the array to JSON and output the results
    echo json_encode($resultArray);
}
catch (Exception $e)
{
	if ($result == 1) 
	{
		$resultArray = array('result' => 'success');
		echo json_encode($resultArray);
		die;
	}
	
}
	
	
}
 
// Close connections
mysqli_close($con);
?>