<?php
    if(!isset($_POST["voornaam"], $_POST["achternaam"], $_POST["leeftijd"], $_POST["adress"], 
    $_POST["huisnummer"], $_POST["postcode"], $_POST["woonplaats"], $_POST["wapenstoegestaan"], 
    $_POST["betalingstermijn"], $_POST["contributie"]) ) {
    echo "Missing items!";
    }
?>