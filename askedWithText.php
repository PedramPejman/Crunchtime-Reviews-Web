<body onunload="">
<link rel="stylesheet" href="css/request.css" media="screen" type="text/css" />
<? 
require_once('header.php'); 
require_once('dbData.php');
if  (isset($_POST['course-list'])) {

$con = mysqli_connect($server, $user, $password, $database);
$course = mysqli_real_escape_string($con, $_POST['course-list']);
$student_id = mysqli_real_escape_string($con, $_POST['student_id']);
$problem = mysqli_real_escape_string($con, $_POST['problem']);
$table= "problems_text";


// Check connection to Crunchtime Database
if (mysqli_connect_errno()) {
    echo "Failed to connect to database";
}



$statement = "INSERT INTO `crunchtime_reviews`." . $table . " (`student_id`, `course`, `problem`, `date`) VALUES ('" . $student_id . "' , '" . $course . "' , '" . $problem . "' , '09-29-2014')" ; 

//$statement = "INSERT INTO `crunchtime_reviews`.`problems_text` (`course`, `student_id`, `problem`) VALUES ('APMA1110', '12345', 'The CakePHP core team is excited to announce the first beta release of CakePHP 3.0.0. In the weeks since 3.0.0-alpha2, we''ve been hard at work incorporating community feedback on the new release, and completing the remaining changes that will break compatibility in a significant way.')";

//echo $statement;

mysqli_query($con, $statement);




?>



<form action="index.php" id="thank-you-form" >
	<div id="thank-you-div">
		<h3 id="title">Thank you</h3>
		<br>
		<h4> Now what? <br><br> Attend the next Crunchtime session for <? echo $course;?> and see your problem worked out in full detail!</h5>
		<input id="home-redirect" name="redircted" class="btn" type="submit" value="Home" />
	</div>
	<div id="loading">
		
	</div>
</form>


<?}
else {
?>

<form action="index.php" id="thank-you-form" >
	<div id="thank-you-div">
		<h3 id="title">Oops</h3>
		<br>
		<h4> Something went wrong!<br><br> We are working to get things up and running again!</h5>
		<input id="home-redirect" name="redircted" class="btn" type="submit" value="Home" />
	</div>
	<div id="loading">
		
	</div>
</form>

<?
}?>




<? require_once('./includes/footer.php'); ?>