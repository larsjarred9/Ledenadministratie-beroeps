<?php
// session_start();
// if (!isset($_SESSION["loggedin"])) {
//     header("Location: ../index.html");
//     exit();
// }

include("../../php/database.php");

$id = $_GET["id"];

if($stmt = $conn->prepare("DELETE FROM leden WHERE ledennummer = ?")) {
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("Location: ../leden.php");
}
?>