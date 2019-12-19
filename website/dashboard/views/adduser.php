<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../../index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administratie - Lid Toevoegen</title>
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
                <h2>Dashboard - Nieuw lid aanmaken</h2>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="../../php/adduser.php">
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Voornaam">Voornaam</label>
                                        <input type='text' class='form-control' name='voornaam' id='Voornaam' placeholder='Voornaam' require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Achternaam">Achternaam</label>
                                        <input type='text' class='form-control' name='achternaam' id='Achternaam' placeholder='Achternaam' require>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCity">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email@email.com" id="email" require>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Address">Address</label>
                                        <input type='text' class='form-control' name='adress' id='Address' placeholder='Addres' require> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Huisnummer">Huisnummer</label>
                                        <input type="text" class="form-control" name='huisnummer' id="Huisnummer" placeholder="Huisnummer" require>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="woonplaats">Woonplaats</label>
                                        <input type='text' class='form-control' name='woonplaats' id='woonplaats' placeholder='woonplaats' require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="geboortejaar">Geboortejaar</label>
                                        <input type="text" class="form-control" name="geboortejaar" id="geboortejaar" placeholder="geboortejaar" require>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Geslacht">Geslacht<br></label>
                                        <select class="form-control" name="geslacht" id="geslacht">
                                            <option value="Man">Man</option>
                                            <option value="Vrouw">Vrouw</option>
                                            <option value="Ongeidentificeerd">Ongeidentificeerd</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Contributie">Contributie</label>
                                        <input type="text" class="form-control" name="contributie" id="Contributie" placeholder="Contributie" require>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Geslacht">Betalingstermijn<br></label>
                                        <input type="date" class="form-control" name="betalingtermijn" id="Betalingstermijn" placeholder="Betalingstermijn (YYYY-MM-DD)" require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Contributie">Wapenstoegestaan</label>
                                        <input type="text" name="wapenstoegestaan" class="form-control" id="Wapenstoegestaan" placeholder="Wapenstoegestaan" require>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Geslacht">Postcode<br></label>
                                        <input type='text' class='form-control' name='postcode' id='Postcode' placeholder='Postcode' require>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Geslacht">Ledennummer<br></label>
                                         <input type='text' class='form-control' name='ledennummer' id='Ledennummer' placeholder='Ledennummer' require>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Lid Toevoegen</button>
                            </form>
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