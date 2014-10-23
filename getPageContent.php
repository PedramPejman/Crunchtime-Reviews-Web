<?
$id = $_GET['student_id'];
$page = file_get_contents('http://its.virginia.edu/search/people/?s=' . $id . '&b=name');

echo $id . ": ";
$start_pos = strpos($page, "given-name") + 12;
$stop_pos = strpos($page, "<", $start_pos);
echo substr($page, $start_pos, $stop_pos - $start_pos) . " ";

$start_pos = strpos($page, "family-name") + 13;
$stop_pos = strpos($page, "<", $start_pos);
echo substr($page, $start_pos, $stop_pos - $start_pos);

?>
