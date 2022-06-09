<?php

session_start();

// hierin staat een Update function

include("config.php");

$userID = $_SESSION['userID'];

$naam = '';
$studentmail= '';
$adres= '';
$woonplaats= '';
$telnummer= '';
$geboortedatum= '';
$geslacht= '';

// laat huidige data zien
$query = "SELECT * FROM gebruikers WHERE id='$userID'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $naam          = $row['naam'];
    $studentmail   = $row['studentmail'];
    $adres         = $row['adres'];
    $woonplaats    = $row['woonplaats'];
    $telnummer     = $row['telnummer'];
    $geboortedatum = $row['geboortedatum'];
    $geslacht      = $row['geslacht'];
}

// updates/veranderd de data
if (isset($_POST['update'])) {
    $naam          = $_POST['naam'];
    $studentmail   = $_POST['studentmail'];
    $adres         = $_POST['adres'];
    $woonplaats    = $_POST['woonplaats'];
    $telnummer     = $_POST['telnummer'];
    $geboortedatum = $_POST['geboortedatum'];
    $geslacht      = $_POST['geslacht'];

    $query2 = "UPDATE gebruikers set naam ='$naam', studentmail ='$studentmail', adres ='$adres', woonplaats ='$woonplaats', telnummer ='$telnummer', geboortedatum ='$geboortedatum', geslacht ='$geslacht' WHERE id='$userID'";
    mysqli_query($conn, $query2);

    $_SESSION['message'] = 'Gegevens Gewijzigd!';
    $_SESSION['message_type'] = 'warning';
    header('Location: read_gebruiker.php');
}

?>
<?php include('includes/header.php'); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-body">
                    <form action="edit_gebruiker.php?userID=<?php echo $_GET['userID']; ?>" method="POST">
                        <div class="form-group">
                            <input name="naam" type="text" class="form-control" required value="<?php echo $naam; ?>" placeholder="Update Naam">
                        </div>
                        <div class="form-group">
                            <input name="studentmail" type="text" class="form-control" required value="<?php echo $studentmail; ?>" placeholder="Update studentmail">
                        </div>
                        <div class="form-group">
                            <input name="adres" type="text" class="form-control" required value="<?php echo $adres; ?>" placeholder="Update adres">
                        </div>
                        <div class="form-group">
                            <input name="woonplaats" type="text" class="form-control" required value="<?php echo $woonplaats; ?>" placeholder="Update woonplaats">
                        </div>
                        <div class="form-group">
                            <input name="telnummer" type="text" class="form-control" required value="<?php echo $telnummer; ?>" placeholder="Update telnummer">
                        </div>
                        <div class="form-group">Geboortedatum
                            <input type="date" class="form-control" name="geboortedatum" required value="<?php echo strftime('%Y-%m-%d',
                                strtotime($row['geboortedatum'])); ?>">
                            <span class="input-group-append"></span>
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="geslacht">
                                <option disabled>Selecteer Geslacht</option>
                                <option value="vrouw" <?php if ($row['geslacht'] == 'vrouw') { echo "selected"; } else{} ?>>vrouw</option>
                                <option value="man" <?php if ($row['geslacht'] == 'man') { echo "selected"; } else{} ?>>man</option>
                                <option value="genderneutraal" <?php if ($row['geslacht'] == 'genderneutraal') { echo "selected"; } else{} ?>>genderneutraal</option>
                            </select>
                        </div>
                        <button class="btn-success" name="update" value="update">
                            Update
                        </button>
                        <button name="terug">
                            <a href="read_gebruiker.php" class="btn-secondary">Terug</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php'); ?>