<?
print_r($_FILES);
$target_path  = "uploaded_images/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
 echo "Size: " . ($_FILES["uploadedfile"]["size"] / 1024) . " kB<br>";
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{
    echo "The file ".  basename( $_FILES['uploadedfile']['name']).
 " has been uploaded";
} 
else
{
    echo "There was an error uploading the file, please try again!";
	echo $_FILES["uploadedfile"]["error"];
	
}
?>;
