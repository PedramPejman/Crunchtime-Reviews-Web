<body onunload="">
<link rel="stylesheet" href="css/askWithPicture.css" media="screen" type="text/css" />
<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<script src="js/askWithPicture.js"></script>
<?php 



require_once('header.php'); 
require_once('dbData.php');



$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php'; 
$max_file_size = 30000; // size in bytes 
?>

<html lang="en"> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
     
            
         
        <title>Upload form</title> 
     
    </head> 
     
    <body> 
    <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>   
  
<div class='empty'>
</div>

<form id ="upload" action="askedWithPicture.php" method="POST" enctype="multipart/form-data">
    
    <input id="student-id" name='student_id' placeholder='Computing ID' class='student_id' type='text' required />


    <select id='course-list' name='course-list' class='btn'>;
      <option id = 'c1' class='course-choice' value='APMA1110'> APMA 1110</option>;
      <option id = 'c2' class='course-choice' value='APMA2120'> APMA 2120</option>;
      <option class='course-choice' value='APMA2130'> APMA 2130</option>;
    </select>;



    <input type="hidden" name="token" value="1234">
    <input id="uploaded_file" name = "uploaded_file" type="file" required>
    <p>Drag your picture here or click in this area.</p>
    <button type="submit">Upload</button>

</form>
     
    </body> 

</html> 














<? require_once('./includes/footer.php'); ?>