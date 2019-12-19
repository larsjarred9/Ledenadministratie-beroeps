<?php 
    if(!isset( $_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["adress"], 
    $_POST["huisnummer"], $_POST["woonplaats"], $_POST["geboortejaar"], $_POST["geslacht"]) ) {
    echo "Missing items!";
    return false;
    }

    include("database.php");

    if($_POST['geboortejaar'] < 2001) {
        $contributie = 190;
    } else {
        $contributie = 110;
    }
    $wapenstoegestaan = "LP,LG";
    $disable = "N";
    $ledenummer = random_int(100000, 999999);
    if($stmt = $conn->prepare("INSERT INTO leden (ledennummer, voornaam, achternaam, geboortejaar, adress, huisnummer, postcode, woonplaats, wapenstoegestaan, betalingtermijn, contributie, geslacht, email, disable) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)")) {

        $stmt->bind_param("issisissssisss", $ledenummer, $_POST["voornaam"], $_POST["achternaam"], $_POST["geboortejaar"], $_POST["adress"], 
        $_POST["huisnummer"], $_POST["postcode"], $_POST["woonplaats"], $wapenstoegestaan, 
        date("Y-m-d"), $contributie, $_POST["geslacht"], $_POST["email"], $disable);

        $stmt->execute();
        $stmt->close();
        header("Location: ../index.html");
    }else {
        echo "ERROR";
    }

?>