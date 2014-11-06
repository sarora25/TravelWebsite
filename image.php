<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
$conn = mysql_connect("localhost","f13g10","teamten123");
if(!$conn)
{
echo mysql_error();
}
$db = mysql_select_db("student_f13g10",$conn);
if(!$db)
{
echo mysql_error();
}
$id = $_GET['id'];
$q = "SELECT * FROM listings where id='$id'";
$r = mysql_query("$q",$conn);
if($r)
{

$row = mysql_fetch_array($r);
$type = "Content-type: ".$row['mime_type'];
header($type);
echo $row['file_data'];
}
else
{
echo mysql_error();
}

?>