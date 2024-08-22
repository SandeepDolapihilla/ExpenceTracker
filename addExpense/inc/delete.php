<?php
include_once('connect.php');
 
$reg_id = $_GET["regID"];
 
mysqli_query($connection, "DELETE FROM reservation WHERE regID = '$regID'");
 
 
exit();
?>