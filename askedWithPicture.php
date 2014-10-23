<body onunload="">
<link rel="stylesheet" href="css/request.css" media="screen" type="text/css" />
<? 
require_once('header.php'); 
require_once('dbData.php');

$con = mysqli_connect($server, $user, $password, $database);

if (isset($_POST['student_id']) && isset($_POST['course-list'])) {
$initial_check = 1;
$student_id = mysqli_real_escape_string($con, $_POST['student_id']);
$course = mysqli_real_escape_string($con, $_POST['course-list']);
}

//print_r($_FILES);

//renaming business
$target_path  = "image_upload/uploaded_images/";
$filename = basename( $_FILES['uploaded_file']['name']);
$filename = $course . $student_id . time() .  "_" . $filename ;
$target_path = $target_path . $filename;
$MAX_SIZE = 8 * 1000 * 1000; //8 Megabytes


//validation
$type = $_FILES["uploaded_file"]["type"];
$size = $_FILES["uploaded_file"]["size"];


$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "PNG", "JPEG", "GIF");
$extension = end(explode(".", $_FILES["uploaded_file"]["name"]));
if (
      (($type== "image/gif") || ($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/png"))
      && ($size < $MAX_SIZE)
      && (in_array($extension, $allowedExts))
      && ($initial_check == 1)
    )
{

  //upload
  if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_path)) 
  {
     // echo "The file ".  basename( $_FILES['uploaded_file']['name']).
   //" has been uploaded";
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


      <?
  } else
  {
      //echo "There was an error uploading the file, please try again!";
    //echo $_FILES["uploaded_file"]["error"];
    ?>

      <form action="index.php" id="thank-you-form" >
        <div id="thank-you-div">
          <h3 id="title">Oops</h3>
          <br>
          <h4> Something went wrong <br><br> Please make sure the file you have uploaded is a .jpg , .png or .gif and that the size does not exceed 8 Mbs.</h5>
          <input id="home-redirect" name="redircted" class="btn" type="submit" value="Home" />
        </div>
        <div id="loading">
          
        </div>
      </form>



    <?
  }
}
else { //encountered a problem

?>
     <form action="index.php" id="thank-you-form" >
        <div id="thank-you-div">
          <h3 id="title">Oops</h3>
          
          <h4> Something went wrong <br><br> Please make sure the file you have uploaded is a .jpg .png or .gif and that the size does not exceed 8 Mbs.</h5>
          <input id="home-redirect" name="redircted" class="btn" type="submit" value="Home" />
        </div>
        <div id="loading">
          
        </div>
      </form>
<?
}



?>;


