<?php 

    if(!isset($_POST["ledennummer"], $_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["adress"], 
    $_POST["huisnummer"], $_POST["woonplaats"], $_POST["geboortejaar"], $_POST["geslacht"], 
    $_POST["contributie"], $_POST["betalingtermijn"], $_POST["wapenstoegestaan"]) ) {
    echo "Missing items!";
    return false;
    }

    include("database.php");

    if($stmt = $conn->prepare("INSERT INTO leden (ledennummer, voornaam, achternaam, geboortejaar, adress, huisnummer, postcode, woonplaats, wapenstoegestaan, betalingtermijn, contributie, geslacht, email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)")) {

        $stmt->bind_param("issisissssiss",  $_POST["ledennummer"], $_POST["voornaam"], $_POST["achternaam"], $_POST["geboortejaar"], $_POST["adress"], 
        $_POST["huisnummer"], $_POST["postcode"], $_POST["woonplaats"], $_POST["wapenstoegestaan"], 
        $_POST["betalingtermijn"], $_POST["contributie"], $_POST["geslacht"], $_POST["email"]);

        $stmt->execute();
        $stmt->close();
        header("Location: ../dashboard/leden.php");
    }else {
        echo "ERROR";
    }

?>