<?php 
require ('database.php');
$search = $_POST["search"];
header("Location: ../dashboard/leden.php?search=".$search);
?>