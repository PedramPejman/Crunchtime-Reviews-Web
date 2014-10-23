<?php
require_once('dbData.php');
 
//$database = $_GET["database"];
$database = "crunchtime_reviews";
 
// Create connection
$con = mysqli_connect($server, $user, $password, $database);
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$session_id = $_GET['session_id'];
//$sql = $_GET["query"];
$sql = "SELECT student_id FROM attendance WHERE session_id = ". $session_id;

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
    while ($info = mysqli_fetch_array($result)) { 
        //echo $info['student_id'] . "<br>";
        echo "<a style='display:none' class='student'>" .$info['student_id'] . "</a>";
    }
    echo "<a class= 'report'></a>";
    // Finally, encode the array to JSON and output the results
    //echo json_encode($resultArray);

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

<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

<script>
	var address;
	window.onload = function()
	{
		var ids = document.querySelectorAll('.student');
		var report = document.querySelector('.report');

		for (var i = 0 ; i < ids.length; i++) 
		{
			address = "getPageContent.php?student_id=" + ids[i].innerHTML;
			$.ajax({ url: address,
	         type: 'get',
	         success: function(name) {
	            report.innerHTML +=  name + "<br>";

	          },
	          error: function(e) {
	          	alert(JSON.stringify(e));
	          }
			});
		}
		
	}
</script>