<?php
session_start();

include('config.php');

//hierin word de student toegevoegd en opgeslagen aan een evenement in de database
if (isset($_POST['delete_inschrijf'])) {
    $userID = $_POST['userID'];
    $reisID = $_POST['reisID'];
    $query = "DELETE FROM `inschrijvingen` WHERE `reisID` = '$reisID' AND `id`= '$userID'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        echo "Query gefaald.";
    }

    $_SESSION['message'] = 'Uitgeschreven!';
    $_SESSION['message_type'] = 'danger';

    if ($_SESSION['user-lvl'] == 1) {
        header('Location: inschrijven.php?reisID=' . $reisID . '');
    }
    elseif ($_SESSION['user-lvl'] == 2) {
        header('Location: read_inschrijven.php?reisID=' . $reisID . '');
    }
    else{

    }

}

?>
