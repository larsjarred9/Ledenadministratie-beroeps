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

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_SESSION["id"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE users SET password='" . $_POST["newPassword"] . "' WHERE id='" . $_SESSION["id"] . "'");
        $message = "Wachtwoord gewijzigd";
        header("Location: profile.php");
    } else {
        $message = "Huidig wachtwoord is onjuist";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">

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
    <main id="wrapper" class="toggled">

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
        <div class="navbar navbar-expand-lg navbar-light bg-light">
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
                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><i class="fas fa-sliders-h"></i> Toggle Menu</a>

            </div>
        </div>
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
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $email ?></td>
                            </tr>

                        </table>
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PassForm"><i class="fas fa-key"></i> Wijzig wachtwoord</button>

                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="PassForm" tabindex="-1" role="dialog" aria-labelledby="PassFormTitle" aria-hidden="true">
            <!-- shadow p-3 col-sm-3 bg-white rounded -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PassFormTitle">Wachtwoord wijzigen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="frmChange" method="POST" action="profile.php" onsubmit="return validatePassword()">
                            <div>
                                <div class="message"><?php if (isset($message)) { echo $message; } ?></div>
                                <table border="0" cellpadding="10" cellspacing="0" align="center" class="tblSaveForm">
                                    <tr>
                                        <td width="40%"><label>Oud wachtwoord</label></td>
                                        <td width="60%"><input type="password" name="currentPassword" class="txtField" /><span id="currentPassword" class="required"></span></td>
                                    </tr>

                                    <tr>
                                        <td><label>Nieuw wachtwoord</label></td>
                                        <td><input type="password" name="newPassword" class="txtField" /><span id="newPassword" class="required"></span></td>
                                    </tr>

                                    <tr>
                                        <td><label>Bevestig nieuw wachtwoord</label></td>
                                        <td><input type="password" name="confirmPassword" class="txtField" /><span id="confirmPassword" class="required"></span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary btnSubmit"><i class="fas fa-key"></i> Wachtwoord opslaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </main>
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

        $("#PassForm").on("shown.bs.modal", function() {
            $("#myInput").trigger("focus");
        });

        function validatePassword() {
            var currentPassword, newPassword, confirmPassword, output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if (!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "<br><p id='warning'>Vul dit veld in<p>";
                output = false;
            } else if (!newPassword.value) {
                currentPassword.focus();
                document.getElementById("newPassword").innerHTML = "<br><p id='warning'>Vul dit veld in<p>";
                output = false;
            } else if (!confirmPassword.value) {
                currentPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "<br><p id='warning'>Vul dit veld in<p>";
                output = false;
            } else if (currentPassword.value != "<?= $password ?>") {
                if ( <?= "'" . $password . "'" ?> == newPassword.value) {
                    currentPassword.value = "";
                    newPassword.value = "";
                    confirmPassword.value = "";
                    document.getElementById("newPassword").innerHTML = "<br><p id='warning'>Wachtwoord kan niet hetzelfde zijn als het oude wachtwoord!<p>";
                    output = false;
                } else {
                    currentPassword.focus();
                    document.getElementById("currentPassword").innerHTML = "<br><p id='warning'>Wachtwoord is onjuist<p>";
                    output = false;
                }
            } else if (newPassword.value != confirmPassword.value) {
                newPassword.value = "";
                confirmPassword.value = "";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "<br><p id='warning'>De wachtwoorden komen niet overeen<p>";
                output = false
            }
            return output;
        }
    </script>
</body>

</html>