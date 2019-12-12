<?php 

    if(!isset($_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["adress"], 
    $_POST["huisnummer"], $_POST["woonplaats"], $_POST["geboortejaar"], $_POST["geslacht"], 
    $_POST["contributie"], $_POST["betalingstermijn"], $_POST["wapenstoegestaan"]) ) {
    echo "Missing items!";
    return false;
    }
   
    include("database.php");

    if($stmt = $conn->prepare("UPDATE leden SET voornaam = ?, achternaam = ?, geboortejaar = ?, adress = ?, huisnummer = ?, postcode = ?, woonplaats = ?, wapenstoegestaan = ?, betalingtermijn = ?, contributie = ?, geslacht = ?, email = ? WHERE ledennummer = ?")) {
        
        $stmt->bind_param("ssisissssissi", $_POST["voornaam"], $_POST["achternaam"], $_POST["geboortejaar"], $_POST["adress"], 
        $_POST["huisnummer"], $_POST["postcode"], $_POST["woonplaats"], $_POST["wapenstoegestaan"], 
        $_POST["betalingstermijn"], $_POST["contributie"], $_POST["geslacht"], $_POST["email"], $_GET["id"]);

        $stmt->execute();
        $stmt->close();
        header("Location: ../dashboard/leden.php");
    }else {
        echo "ERROR";
    }

?>