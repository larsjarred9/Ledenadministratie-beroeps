<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.html");
    exit();
}

require("../php/database.php");

$stmt = $conn->prepare("SELECT password, email FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION["id"]);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administratie - Mijn Account</title>
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
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="leden.php">Leden</a>
                </li>
                <li>
                    <b><a href="profile.php">Mijn Account</a></b>
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
                <h2>Dashboard - Mijn Account</h2>
                <div id="boxed" class="shadow p-3 col-sm-3 bg-white rounded">
                    <div>
                        <p>Accountgegevens</p>
                        <table>
                            <tr>
                                <td>Naam:</td>
                                <td><?= $_SESSION["name"] ?></td>
                                <td><a href="" class="btn btn-warning ml-3"><i class='fas fa-user-edit'></i></a></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $email ?></td>
                                <td><a href="" class="btn btn-warning ml-3"><i class='fas fa-user-edit'></i></a></td>
                            </tr>

                        </table>
                        <input class="btn btn-primary" type="submit" value="Wachtwoord veranderen" placeholder="Wachtwoord veranderen" id="submit">
                    </div>
                </div>
                <div id="boxed" class="shadow p-3 col-sm-3 bg-white rounded">
                    <div>
                        <p>Betaalmethode</p>
                        <table>
                            <tr>
                                <td>:</td>
                                <td><?= $_SESSION["name"] ?></td>
                                <td><a href="" class="btn btn-warning ml-3"><i class='fas fa-user-edit'></i></a></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $email ?></td>
                                <td><a href="" class="btn btn-warning ml-3"><i class='fas fa-user-edit'></i></a></td>
                            </tr>
                        </table>
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