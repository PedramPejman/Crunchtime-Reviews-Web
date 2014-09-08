<!DOCTYPE html>
<?
require_once('header.php');
require_once('dbData.php');
$unit = -1;
$course = "1110";




if (isset($_GET['course'])) $course = @$_GET['course'];
if (isset($_GET['unit'])) $unit = @$_GET['unit'];


$con = mysqli_connect($server, $user, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Checking if a unit has been specified
if ($unit != -1)$result = mysqli_query($con,"SELECT * FROM apma_".$course."_videos WHERE unit = ".$unit." ORDER BY number");
else $result = mysqli_query($con,"SELECT * FROM apma_".$course."_videos ORDER BY unit, number");


?>

<head>
  <meta charset="UTF-8">
  <title>Gallery</title>
    <link rel="stylesheet" href="css/videos.css" media="screen" type="text/css" />
</head>

<body>

<div class="gallery">
<div ><h1 id="course_title"> <? echo "APMA " . $course?> </h1> </div>
<hr id="line-across-2">
  <?
  //Displaying all videos and their descriptions 
  while ($video_info = mysqli_fetch_array($result)) {
	$video_id = substr($video_info['video_url'], 3 + strrpos($video_info['video_url'], '?v='));
	$picture_url = 'http://img.youtube.com/vi/'. $video_id . '/hqdefault.jpg';
		echo "<div id='".$video_info['unit']."-".$video_info['number']."' class='row'>";
				
				echo "<div class='video'>";
					echo "<a class='lazy-load' href=".$video_info['video_url'].">";
					echo  "<img class= 'loading_pic' id = 'loading' alt='' src='". $picture_url ."'/>";
					echo "</a>";
				echo "</div>";
				
				echo "<div class='column description'>";
					echo"<h2 class= 'description_title'>" . $video_info['unit'] . "." . $video_info['number'] . " " .$video_info['title'] . "</h2>";
					echo "<p description>" . $video_info['description'] . "</p>";
				echo "</div>";
		  echo "</div>";
	}?>
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<script src='http://julian.com/research/velocity/build/jquery.velocity.min.js'></script>
  <script src='http://julian.com/research/velocity/build/velocity.ui.js'></script>
  <script src="js/videos.js"></script>

</body>

</html>
