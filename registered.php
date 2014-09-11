<body onunload="">
<link rel="stylesheet" href="css/request.css" media="screen" type="text/css" />
<? 
require_once('header.php'); 
require_once('dbData.php');
if  (isset($_POST['emailaddress'])) {

$con = mysqli_connect($server, $user, $password, $database);

$course = $_POST['course-list'];
$professor = $_POST['professor'];
$email =  mysqli_real_escape_string( $con, $_POST['emailaddress']);
$purpose =  mysqli_real_escape_string( $con, $_POST['purpose']);

$subject = "Request Confirmation";
$message = "Dear Student,\n\nThank you for your request. As more requests for the examination in " . $course ." come in, we will work with our instructors and schedule a session. We will notify you and your classmates via Email when the session is scheduled.\n\nSincerely, \n\nYour Humble Crunchers";

$table= "sessions";



// Check connection to Crunchtime Database
if (mysqli_connect_errno()) {
    echo "Failed to connect to database";
}


$statement = "INSERT INTO requests (`student_id`, `course`, `reason`, `professor`) VALUES ('" . $email . "' , '" . $course . "' , '" . $purpose . "' , '" . $professor . ")" ; 

mysqli_query($con, $statement);



?>


<? 
mail($email, $subject, $message, "From: Crunchtime Support <crunchtimesupport@virginia.edu>"); 
?>

<form action="index.php" id="thank-you-form" >
	<div id="thank-you-div">
		<h3 id="title">Thank you</h3>
		<br>
		<h4> You will receive a confirmation Email shortly. <br><br> You, along with your classmates, will also receive an Email when the session is scheduled.</h5>
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