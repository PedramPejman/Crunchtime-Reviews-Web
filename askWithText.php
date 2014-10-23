<body onunload="">
<link rel="stylesheet" href="css/request.css" media="screen" type="text/css" />
<? 
require_once('header.php'); 
require_once('dbData.php');
?>


<?



echo "<form id = 'request_form' method='post' action='askedWithText.php'>";


echo "<form style='display:none' id = 'request_form' method='post' action='registered.php'>";

echo "<h3 id='title'>Tell Us Your Problem!</h3>";
    echo "<select id='course-list' name='course-list' class='btn' onchange= 'change_course();'>";
      echo "<option id = 'c1' class='course-choice' value='APMA1110'> APMA 1110</option>";
      echo "<option id = 'c2' class='course-choice' value='APMA2120'> APMA 2120</option>";
      echo "<option class='course-choice' value='APMA2130'> APMA 2130</option>";
    echo "</select>";

	$placeholder = "Describe your problem, or tell us where we could find it.";
		//echo "<input type = 'text' name='purpose' placeholder='".$placeholder."' class='message big' required></textarea>";
		echo "<textarea rows='6' cols='50' name ='problem' placeholder= '".$placeholder."' required></textarea>";
    echo "<input name='student_id' placeholder='Computing ID' class='email' type='text' required />";
    echo "<input name='submit' class='btn' type='submit' value='Send' />";
    
echo "</form>";

?>



<? require_once('./includes/footer.php'); ?>