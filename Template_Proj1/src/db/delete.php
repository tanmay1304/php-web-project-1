<?php
session_start();

include "../connection.php";

$sql="DELETE FROM carti WHERE id='{$_GET['id']}'";
$query= mysqli_query($con,$sql) or die(mysqli_error($con));
header('Location:../catalog.php'); 
?>

<!--- unde redirectionez cu header-->