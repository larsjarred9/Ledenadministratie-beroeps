<?php 
require ('database.php');

$sql = "SELECT * FROM leden ORDER BY achternaam WHERE achternaam = ?;";
header("Location: ../dashboard/leden.php");
?>