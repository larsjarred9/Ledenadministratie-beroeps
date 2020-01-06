<?php
include('../php/database.php');

session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.html");
    exit();
}

$sql = "SELECT * FROM leden WHERE disable='N' ORDER BY achternaam;";
$result = $conn->query($sql);
$contributie_aankomend_jaar;
$totalcount = 0;
foreach ($result as $item) {
    $totalcount++;
    $contributie_aankomend_jaar += $item["contributie"];
};
$sql2 = "SELECT * FROM contributies ORDER BY jaar DESC;";


$results2 = $conn->query($sql2);
$totaleInkomsten = 0;

foreach ($results2 as $item2) {
    $totaleInkomsten += $item2["totaalinkomsten"];
    $i = 0;
    if ($i == 0) {
        $contributie_afgelopen_jaar = $item2["totaalinkomsten"];
    }
    $i++;
}

?>
<!DOCTYPE html>
<html lang="nl">

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
                    <a href="disabledleden.php">Disabled Leden</a>
                </li>
                <li>
                    <a href="profile.php">Mijn Account</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand"><img src="../images/login/logo.png"></a>
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
                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><i class="fas fa-sliders-h"></i> Toggle Menu</a>

            </div>
        </div>
        <main id="page-content-wrapper">
            <div class="container-fluid">
                <h2>Dashboard - Informatie</h2>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Actieve Leden</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $totalcount ?></h5>
                                <p class="card-text">Het aantal actieve leden.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Totale Inkomsten</div>
                            <div class="card-body">
                                <h5 class="card-title">€ <?= $totaleInkomsten ?></h5>
                                <p class="card-text">Inkomsten van alle jaren.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Verwachte inkomsten</div>
                            <div class="card-body">
                                <h5 class="card-title">€ <?= $contributie_aankomend_jaar ?></h5>
                                <p class="card-text">Inkomsten van aankomend jaar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-brown" style="max-width: 18rem;">
                            <div class="card-header">Vorige Inkomsten</div>
                            <div class="card-body">
                                <h5 class="card-title">€ <?= $contributie_afgelopen_jaar ?></h5>
                                <p class="card-text">Inkomsten van vorig jaar.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="container-fluid">
                        <br>
                        <h2>Leden - Nog niet betaald</h2>
                        <div class="col-sm-12 no-padding">
                        <form method="POST" action="../php/search.php">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input required type="text" name="search" placeholder="Zoek een lid op Achternaam" class="form-control" id="zoeken">
                                </div>
                                <div class="form-group col-md-1">
                                    <button class="btn btn-primary form-control" type="submit" id="submit"><i class="fas fa-search"></i> Zoeken</button>
                                </div>
                            </div>
                        </form>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nummer</th>
                                        <th scope="col">Voornaam</th>
                                        <th scope="col">Achternaam</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Betalingstermijn</th>
                                        <th scope="col">Te betalen</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($result as $item) {
                                        if($item["betalingtermijn"] < date("Y-m-d") && $item['disable'] == 'N') {
                                            echo "<td>" . $item["ledennummer"] . "</td>" . "<td>" . $item["voornaam"] . "</td><td>" . $item["achternaam"] . "</td><td>" . $item["email"] . "</td><td>" . $item["betalingtermijn"] . "</td><td>" . $item["contributie"] . "</td><td><a href='views/viewuser.php?id=" . $item['ledennummer'] . "' class='btn btn-info'><i class='fas fa-user'></i></a></td><td><a href='views/edituser.php?id=" . $item['ledennummer'] . "' class='btn btn-warning'><i class='fas fa-user-edit'></i></a></td><td><a href='views/removeuser.php?id=" . $item["ledennummer"] . "' class='btn btn-danger'><i class='fas fa-user-minus'></i></a></td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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