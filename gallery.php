<body onunload="">
<? require_once('header.php'); 
   require_once('dbData.php');?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Gallery</title>
<link rel="stylesheet" href="css/gallery.css" media="screen" type="text/css" />
</head>
<body>
<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

<?
$course = "1110";
$ids = array();
$video_titles = array();

if (isset($_GET['course'])) $course = @$_GET['course'];

$con = mysqli_connect($server, $user, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM apma_".$course."_videos ORDER BY unit, number");

//creating $gallery, which keeps track of which units and sections are available for display.
while ($video_info = mysqli_fetch_array($result)) {	
	$unit = $video_info['unit'];
	$section = $video_info['number'];
	$ids[$unit][$section] = $video_info['id'];
	$id = $video_info['id'];
	//$video_titles[$unit][$section] = $video_info['title'];
	$video_titles[$id] = $video_info['title'];


	if (!isset($gallery[$unit])) $gallery[$unit] = array(array($section, $id));
	else	array_push($gallery[$unit], array($section,$id));
	}
	

	
	

//printing all the units and sections available for display
echo "<form id='gallery' method='GET' action='videos.php'>";
	echo "<div class='unitizer'>";
		foreach (array_keys($gallery) as $unit)
		{
			echo "<ul class='ribbon-nav'><li  class='header'><a href='videos.php?course=".$course."&unit=".$unit."' class='link_out'> Unit ".$unit."</li>";
			foreach ($gallery[$unit] as $video)
			{
				$section = $video[0];
				$id = $video[1];
				echo "<li><a class='link_out' href='videos.php?course=".$course."&unit=".$unit."#".$unit.".".$section."'>".$unit.".".$section . " - ".$video_titles[$id]."</a></li>"; 
			}
			echo "</ul>";
		}
	echo "</div>";
echo "</form>";
?>
</body>
<script src="js/gallery.js"></script>
</html>
