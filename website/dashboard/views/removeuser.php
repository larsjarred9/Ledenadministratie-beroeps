<?php
// session_start();
// if (!isset($_SESSION["loggedin"])) {
//     header("Location: ../index.html");
//     exit();
// }

session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../../index.html");
    exit();
}

include("../../php/database.php");

if ($_GET["confirmed"] == "true") {
    $id = $_GET["id"];

    if ($stmt = $conn->prepare("UPDATE leden SET disable='Y' WHERE ledennummer = ?")) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: ../leden.php");
    }
}

if ($stmt = $conn->prepare("SELECT ledennummer,voornaam,achternaam FROM leden WHERE ledennummer = ? ORDER BY achternaam;")) {
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($ledennummer, $voornaam, $achternaam);
        $stmt->fetch();
    } else {
        echo "Er ging iets fout tijdens het vinden van het lid. Probeer het later opnieuw.";
    }
}

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administratie - Confirm Delete</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/custom.css">
    <script src="https://kit.fontawesome.com/24c24daece.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="../index.php">Dashboard</a>
                </li>
                <li>
                    <a href="../leden.php">Leden</a>
                </li>
                <li>
                    <a href="../profile.php">Mijn Account</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="../../images/login/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../profile.php">Welkom, <i class="fas fa-user-circle"></i> <?= $_SESSION["name"] ?>!</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../php/login/logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</span></a>
                    </li>
                </ul>
                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Toggle Menu</a>

            </div>
        </div>
        <main id="page-content-wrapper">
            <div class="container-fluid">
                <h2>Dashboard - Gegevens Inzien</h2>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Voornaam">Voornaam</label>
                                        <?php echo "<input type='text' disabled class='form-control' name='voornaam' id='Voornaam' placeholder='Voornaam' value='" . $voornaam . "'>" ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Achternaam">Achternaam</label>
                                        <?php echo "<input type='text' disabled class='form-control' name='achternaam' id='Achternaam' placeholder='Achternaam' value='" . $achternaam . "'>" ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Geslacht">Ledennummer<br></label>
                                    <?php echo "<input type='text' class='form-control' disabled name='postcode' id='Postcode' placeholder='Postcode' value='" . $ledennummer . "'>" ?>
                                </div>
                                <a class="btn btn-primary" href="../leden.php"><i class="fas fa-times-circle"></i> Anuleren</a>
                                <?php echo '<a class="btn btn-danger" href="removeuser.php?id=' . $_GET["id"] . '&confirmed=true"><i class="fas fa-check-circle"></i> Verwijder Lid</a>' ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>