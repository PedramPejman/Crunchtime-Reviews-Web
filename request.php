<body onunload=''>
<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<? require_once('header.php'); 
   ?>
<link rel='stylesheet' href='css/request.css' media='screen' type='text/css' />


<?


if(isset($_POST['action']) && !empty($_POST['action'])) {
    $course = $_POST['course'];
	$action = $_POST['action'];
	switch($action) {
        case 'get_form' : get_form($course); break;
    }
}
else {
$course = "APMA1110";
get_form($course);
}
?>
<script src='js/request.js'></script>
</body>
</html>



<?
function get_form($course) 
{

require_once('dbData.php');
$table    = "professors";

$con = mysqli_connect($server, $user, $password, $database);

// Check connection to Crunchtime Database
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$items = mysqli_query($con, "SELECT name FROM " . $table . " WHERE `course` = '". $course ."'");

if(isset($_POST['action']) && !empty($_POST['action'])) {
echo "<form id = 'request_form' method='post' action='registered.php'>";
}
else {
echo "<form style='display:none' id = 'request_form' method='post' action='registered.php'>";
}
echo "<h3 id='title'>Request a Session!</h3>";
    echo "<select id='course-list' name='course-list' class='btn' onchange= 'change_course();'>";
      echo "<option id = 'c1' class='course-choice' value='APMA1110'> APMA 1110</option>";
      echo "<option id = 'c2' class='course-choice' value='APMA2120'> APMA 2120</option>";
      echo "<option class='course-choice' value='APMA2130'> APMA 2130</option>";
    echo "</select>";
	echo "<select id='prof-list' name='professor' class='btn'>";
			while ($item = mysqli_fetch_array($items))
	{
		echo "<option class='course-choice' value=".$item['name']."'>".$item['name']."</option>";
	}
	
    echo "</select>";
		$placeholder = "Purpose of session?";
		echo "<input type = 'text' name='purpose' placeholder='".$placeholder."' class='message big' required></textarea>";
    echo "<input name='emailaddress' placeholder='UVa Email?' class='email' type='email' required />";
    echo "<input name='submit' class='btn' type='submit' value='Send' />";
echo "</form>";

}
?>