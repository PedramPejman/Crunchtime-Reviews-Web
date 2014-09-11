<?
//Sending email and inputting the ATTEND request to the database

require_once('dbData.php');
$con = mysqli_connect($server, $user, $password, $database);



if (isset($_POST['student_id']) && isset($_POST['course']) && isset($_POST['session_id']) && isset($_POST['date'])) {
$student_id = mysqli_real_escape_string( $con, $_POST['student_id']);
$course = $_POST['course'];
$session_id = $_POST['session_id'];
$date = $_POST['date'];
}




$email = $student_id . "@virginia.edu";
$subject = "Attendance Confirmation";
$message = "Thank you for registering to attend the Crunchtime Session for ". $course." on ". $date.". \n\nWe look forward to seeing you! \n\nSincerely, \nYour Humble Crunchers";
mail($email, $subject, $message, "From: Crunchtime Support <crunchtimesupport@virginia.edu>");


$table= "sessions";




// Check connection to Crunchtime Database
if (mysqli_connect_errno()) {	
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$session_attendance = mysqli_query($con, "SELECT * FROM " . $table . " WHERE session_id = " . $session_id);
while ( $attendance = mysqli_fetch_array($session_attendance)) {
	$attendance_number = $attendance['attendance'] + 1;
}


$statement = "UPDATE " . $table . " SET attendance = " . $attendance_number . " WHERE session_id = " . $session_id;

$result = mysqli_query($con, $statement);



$table= "attendance";
$statement = "INSERT INTO ". $table ." VALUES ( '". $session_id  ."',  '". $student_id ."')";
$result = mysqli_query($con, $statement);

?>



