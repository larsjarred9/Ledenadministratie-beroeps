    <!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administratie - Registratie</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
    <!-- Login Content-->
    <main class="container">
        <div class="register-box mx-auto shadow p-3 mb-5 bg-white rounded">
            <!-- Shadow, Center in the middle of screen -->
            <!-- Logo-->
            <center><img src="images/login/logo.png"></center>
            <h4 class="card-title mb-4 mt-1">Register</h4>
            <p>Dit is een registratie systeem dat los staat van de opdracht, dit is bedoeld om met grote groepen leden aan te maken om te kunnen testen in onze database. We zouden het aardig vinden dat je enkele gebruikers aanmaakt. Dit maakt testen voor ons gemakkelijker.</p>
            <!-- Forum Itself -->
            <form method="POST" action="php/register.php">
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
                        <label for="Address">Adres</label>
                        <input type='text' class='form-control' name='adress' id='Address' placeholder='Adres' require>
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
                        <input type="text" class="form-control" name="geboortejaar" id="geboortejaar" placeholder="geboortejaar (2003)" require>
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
                        <label for="Geslacht">Postcode<br></label>
                        <input type='text' class='form-control' name='postcode' id='Postcode' placeholder='Postcode' require>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Registreren</button>
            </form>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--<script src="js/login.js"></script>-->
    <!-- 145.118.6.22:3000 -->
</body>

</html>