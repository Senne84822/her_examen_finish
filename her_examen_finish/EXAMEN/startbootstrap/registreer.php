<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/main.css">
    <title>Registreer</title>
</head>
<body>
<?php
if (isset($_POST['registreer']))
{
    //connectie met database maken
    require('config.php');

    //encode het wachtwoord
    $encoded = md5($_POST['password']);

    //lees gegevens
    $naam = $_POST['naam'];
    $studentmail = $_POST['studentmail'];
    $password = $encoded;
    $adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];
    $telnummer = $_POST['telnummer'];
    $geboortedatum = $_POST['geboortedatum'];
    $geslacht = $_POST['geslacht'];

    //maak query
    $query = "INSERT INTO `gebruikers`(`naam`, `studentmail`, `password`, `adres`, `woonplaats`, `telnummer`, `geboortedatum`, `geslacht`, `is_admin`) VALUES ('$naam', '$studentmail', '$password', '$adres', '$woonplaats', '$telnummer', '$geboortedatum', '$geslacht', 1)";

    //voer query uit
    $result = mysqli_query($conn, $query);
    header("Location: login.php");

}
?>
<center>
    <h2 class="gs-title">Registreer</h2>
    <form method="post" action="">

        <table border="0">
            <tr>
                <th>naam:</th>
                <th><input type="text" name="naam" size="30" required></th>
            </tr>
            <tr>
                <th>email:</th>
                <th><input type="text" name="studentmail" pattern=".+@glr.nl" size="30"  required></th>
            </tr>
            <tr>
                <th>Wachtwoord:</th>
                <th><input type="password" name="password" required></th>
            </tr>
            <tr>
                <th>adres:</th>
                <th><input type="text" name="adres" size="30" required></th>
            </tr>
            <tr>
                <th>woonplaats:</th>
                <th><input type="text" name="woonplaats" size="30" required></th>
            </tr>
            <tr>
                <th>telnummer:</th>
                <th><input type="text" name="telnummer" placeholder="06 nummer" required></th>
            </tr>
            <tr>
                <th>geboortedatum:</th>
                <th><input type="date" name="geboortedatum" required></th>
            </tr>
            <tr>
                <th>Geslacht</th>
                <td>
                    <select class="form-select" name="geslacht" required>
                        <option disabled selected value="">Selecteer Geslacht</option>
                        <option value="vrouw">vrouw</option>
                        <option value="man">man</option>
                        <option value="genderneutraal">genderneutraal</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" class="btn btn-success btn-block" name="registreer" value="Registreer"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><a>Al een account? <a class="btn btn-warning btn-block" href='login.php' name="login" value="login">Log in</a></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><a class='btn btn-secondary' href='dist/index.php'>Ga terug naar Home</a></td>
            </tr>
        </table>

    </form>
</center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>