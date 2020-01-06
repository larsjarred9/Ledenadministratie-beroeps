<?php
include('../php/database.php');

session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.html");
    exit();
}

$level = $_SESSION["level"];

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM leden WHERE disable='Y' AND achternaam LIKE '%" . $search . "%' ORDER BY achternaam;";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * FROM leden WHERE disable='Y' ORDER BY achternaam;";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administratie - Leden</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">
    <script src="https://kit.fontawesome.com/24c24daece.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="leden.php">Leden</a>
                </li>
                <li>
                    <a class="active" href="disabledleden.php">Disabled Leden</a>
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
                <h2>Dashboard - Disabled Leden</h2>
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
                <div class="center-div">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nummer</th>
                                <th scope="col">Voornaam</th>
                                <th scope="col">Achternaam</th>
                                <th scope="col">Email</th>
                                <th scope="col">Geboortejaar</th>
                                <th scope="col">Woonplaats</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($level == 1) {
                                foreach ($result as $item) {
                                    echo "<td>" . $item["ledennummer"] . "</td>" . "<td>" . $item["voornaam"] . "</td><td>" . $item["achternaam"] . "</td><td>" . $item["email"] . "</td><td>" . $item["geboortejaar"] . "</td><td>" . $item["woonplaats"] . "</td><td><a href='views/viewuser.php?id=" . $item['ledennummer'] . "&disabled=true' class='btn btn-info'><i class='fas fa-user'></i></a></td><td><a href='views/edituser.php?id=" . $item['ledennummer'] . "&disabled=true' class='btn btn-warning'><i class='fas fa-user-edit'></i></a></td><td><a href='views/enableuser.php?id=" . $item["ledennummer"] . "' class='btn btn-success'><i class='fas fa-user-check'></i></a></td></tr>";
                                }
                            } else if ($level == 2) {
                                foreach ($result as $item) {
                                    echo "<td>" . $item["ledennummer"] . "</td>" . "<td>" . $item["voornaam"] . "</td><td>" . $item["achternaam"] . "</td><td>" . $item["email"] . "</td><td>" . $item["geboortejaar"] . "</td><td>" . $item["woonplaats"] . "</td><td><a href='views/viewuser.php?id=" . $item['ledennummer'] . "&disabled=true' class='btn btn-info'><i class='fas fa-user'></i></a></td><td><a href='views/edituser.php?id=" . $item['ledennummer'] . "&disabled=true' class='btn btn-warning'><i class='fas fa-user-edit'></i></a></td></tr>";
                                }
                            } else if ($level == 3) {
                                foreach ($result as $item) {
                                    echo "<td>" . $item["ledennummer"] . "</td>" . "<td>" . $item["voornaam"] . "</td><td>" . $item["achternaam"] . "</td><td>" . $item["email"] . "</td><td>" . $item["geboortejaar"] . "</td><td>" . $item["woonplaats"] . "</td><td><a href='views/viewuser.php?id=" . $item['ledennummer'] . "&disabled=true' class='btn btn-info'><i class='fas fa-user'></i></a></td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

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