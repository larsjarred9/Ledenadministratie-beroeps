<?php
include('../php/database.php');

session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.html");
    exit();
}

$sql = "SELECT * FROM leden ORDER BY achternaam;";

$result = $conn->query($sql);

$totalcount = 0;
$contributie_aankomend_jaar = 0;

$leeftijdtotaal = 0;
foreach ($result as $item) {
    $totalcount++;

    $leeftijdtotaal += $item["leeftijd"];

};
$gemiddelde_leeftijd = $leeftijdtotaal/$totalcount;

$sql2 = "SELECT * FROM contributies ORDER BY jaar DESC;";

$results2 = $conn->query($sql2);

foreach ($results2 as $item2) {
    $i = 0;
    if ($i == 0) {
        $contributie_afgelopen_jaar = $item2["totaalinkomsten"];
    }
    $i++;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administratie - Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
    <script src="https://kit.fontawesome.com/24c24daece.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <b><a href="index.php">Dashboard</a></b>
                </li>
                <li>
                    <a href="leden.php">Leden</a>
                </li>
                <li>
                    <a href="profile.php">Mijn Account</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="../images/login/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Welkom, <i class="fas fa-user-circle"></i> <?= $_SESSION["name"] ?>!</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php/login/logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</span></a>
                    </li>
                </ul>
                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Toggle Menu</a>

            </div>
        </nav>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h2>Dashboard - Informatie</h2>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Leden</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $totalcount ?></h5>
                                <p class="card-text">Het aantal actieve leden.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Gemiddelde leeftijd</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= round($gemiddelde_leeftijd)?></h5>
                                <p class="card-text">De gemiddelde leeftijd.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Inkomsten</div>
                            <div class="card-body">
                                <h5 class="card-title">€ 399,00</h5>
                                <p class="card-text">Inkomsten van deze maand.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Voige Inkomsten</div>
                            <div class="card-body">
                                <h5 class="card-title">€ <?= $contributie_afgelopen_jaar ?></h5>
                                <p class="card-text">Inkomsten van vorig jaar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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